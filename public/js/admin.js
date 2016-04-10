function log(item) {
    console.log(item);
}

(function() {

    var pluginName = 'multiplier';

    function Plugin(container, options) {
        this.container = container;
        this.$container = $(container);
        this.options = $.extend({}, $.fn[pluginName].defaults, options);
        this.init();
    }

    Plugin.prototype = {

        grouped: false,
        positions: [],
        init: function() {

            var multiplier = this,
                options = this.options,
                $container = this.$container;

            if (options.allowGroups) {

                multiplier.update();

                $container.sortable({
                    handle: '.group-handle',
                    items: '.locked',
                    connectWith: '.hotbox',
                    helper: 'clone',
                    placeholder: 'multiply-placeholder',
                    axis: 'y',
                    start: function(event, ui) {

                        var childrenCount = $(ui.item).children().length;
                        var multiplyGroupHeight = parseInt($(ui.item).find('.multiply-group').css('height').replace(/[^-\d\.]/g, ''));
                        var multiplyRowHeight = parseInt($(ui.item).find('.multiply').css('height').replace(/[^-\d\.]/g, ''));
                        var multiplyPlaceholderHeight = (multiplyGroupHeight + (multiplyRowHeight * (childrenCount - 1)));

                        $('.multiply-placeholder').css('height', multiplyPlaceholderHeight +'px' );
                        $('.hotbox').addClass('active');

                    },
                    stop: function() {
                        $('.hotbox').removeClass('active');
                        $('.info').children().removeClass('active');
                    },
                    update: function() {
                        multiplier.update();
                    }
                });

                $('.hotbox').sortable({

                    over: function(event, ui) {
                        var param = ui.item.hasClass('multiply') ? ['hot-row', 'success'] : ['hot-group', 'danger'];
                        $(this).addClass('alert-' + param[1]);
                        $container.addClass(param[0]);
                        $(this).find('.multiply-placeholder').addClass('in-box');

                    },
                    out: function(event, ui) {
                        var param = ui.item.hasClass('multiply') ? ['hot-row', 'success'] : ['hot-group', 'danger'];
                        $(this).removeClass('alert-' + param[1]);
                        $container.removeClass(param[0]);
                        $(this).find('.multiply-placeholder').removeClass('in-box');

                    },
                    receive: function(event, ui) {
                        var param = ui.item.hasClass('multiply') ? 'hot-row' : 'hot-group';

                        $container.removeClass(param);

                        if (ui.item.hasClass('multiply')) {
                            options.onCreatingGroup();
                            $container
                                .append($('<div class="locked"></div>').append(options.groupElement).append(ui.item));

                        } else {

                            if(!$container.children().length > 0){
                                log('entered');
                                log($container);
                                $container.append(ui.item);

                            } else {
                                options.onDeletingGroup();
                                ui.item.remove();
                            }
                        }
                        multiplier.update();
                    }
                });

            } else {

                multiplier.update();

                $container.sortable({
                    axis: 'y',
                    update: function() {
                        multiplier.update();
                    }
                });
            }

            $container.on('click', '.add-item', function(e) {
                multiplier._addRow(e);
            });

            $container.on('click', '.remove-item', function() {
                multiplier._removeRow($(this));
            });

        },
        destroy: function() {

            this.$container.sortable('destroy');
            this.$container.children().each(function(i, elem){
                if($(elem).hasClass('ui-sortable')){
                    $(elem).sortable('destroy');
                }
            });

            this.$container.unbind('click');

        },
        update: function() {

            var multiplier = this,
                options = this.options;

            options.onUpdate();

            if (options.allowGroups) {

                multiplier._updateGroups();

                $('.ungrouped').sortable({
                    items: '.multiply',
                    connectWith: '.locked, .hotbox',
                    axis: 'y',
                    start: function(event, ui) {
                        options.onMove();
                        $('.hotbox').addClass('active');

                        var param = ui.item.hasClass('multiply') ? '.row-marker' : '.group-marker';

                        $(param).addClass('active');

                        if (ui.item.hasClass('multiply-group')) {
                            ui.placeholder.addClass('for-group');
                        }
                    },
                    stop: function() {
                        $('.hotbox').removeClass('active');
                        $('.info').children().removeClass('active');
                    },
                    update: function() {
                        multiplier.update();
                    }
                });

                $('.locked').sortable({
                    handle: '.item-handle',
                    items: '.multiply, .multiply-group',
                    connectWith: '.ungrouped, .locked, .hotbox',
                    axis: 'y',
                    start: function(event, ui) {
                        options.onMove();
                        $('.hotbox').addClass('active');

                        var param = ui.item.hasClass('multiply') ? '.row-marker' : '.group-marker';

                        $(param).addClass('active');

                        if (ui.item.hasClass('multiply-group')) {
                            ui.placeholder.addClass('for-group');
                        }
                    },
                    stop: function() {
                        $('.hotbox').removeClass('active');
                        $('.info').children().removeClass('active');
                    },
                    update: function() {
                        multiplier.update();
                    }
                });

                var name = this.$container.data('name'),
                    $form = this.$container.closest('form'),
                    input = name + '_group_positions',
                    $input = $form.find('input[name="' + input + '"]'),
                    value = this.positions.join(',');

                if ($input.length > 0) {
                    $input.val(value);
                } else {
                    $form.append('<input type="hidden" name="' + input + '" value="' + value + '"/>');
                }

            } else {
                multiplier._updateRowButtons();
            }

            this._updateRows();
        },
        _updateRowButtons: function() {

            if (this.options.allowGroups) {
                this.$container.children().each(function(index, item) {
                    var $group = $(item).children(),
                        $add_buttons = $('.add-item', $group);

                    $add_buttons.prop('disabled', true).hide();
                    $add_buttons.last().prop('disabled', false).show();
                });
            } else {
                var $add_buttons = $('.add-item', this.$container);

                $add_buttons.prop('disabled', true).hide();
                $add_buttons.last().prop('disabled', false).show();
            }
        },
        _groupWrap: function() {

            if (!this.grouped) {
                $first = this.$container.children().first();
                if ($first.hasClass('multiply')) {
                    $first.nextUntil('.multiply-group').addBack().wrapAll('<div class="ungrouped"></div>');
                }

                this.$container.children().each(function(index, item) {
                    if ($(item).hasClass('multiply-group')) {
                        $(item).nextUntil('.multiply-group').addBack().wrapAll('<div class="locked"></div>');
                    }
                });

                this.grouped = true;
            }
        },
        _groupUnwrap: function() {

            var $container = this.$container;

            if (this.grouped) {
                $container.children().each(function(index, item) {
                    $(item).children().each(function(i, elem) {
                        $container.append($(elem));

                    });
                    $(item).remove();
                });
                this.grouped = false;
            }

        },
        _updateGroups: function() {

            var $container = this.$container;

            var positions = this.positions;

            positions = [];

            this._groupUnwrap();


            $container.children().each(function(index, item) {
                if ($(item).hasClass('multiply-group')) {
                    positions.push($(item).index());
                }

            });

            this.positions = positions;

            this._groupWrap();

            $container.children().each(function(index, item) {
                var $group = $(item).children(),
                    $add_buttons = $('.add-item', $group);

                $add_buttons.prop('disabled', true).hide();
                $add_buttons.last().prop('disabled', false).show();
            });
        },
        _addRow: function(e) {

            $('.with-tooltip').tooltip('destroy');
            var $source = $(e.target).closest('.multiply');
            var $clone = $source.clone();
            $clone.find('.to-reset').find('select, input, textarea').val('').prop('checked', false);
            $source.after($clone);
            $('.with-tooltip').tooltip();




            this.update();
        },
        _removeRow: function($button) {

            var multiplier = this;
            var $items = $button.closest('.multiply-container').find('.multiply');
            if (!$button.prop('disabled') && $items.length > 1) {
                $button.closest('.multiply').fadeOut('fast', function() {
                    $(this).remove();
                    multiplier.update();
                });
            }
        },
        _updateRows: function() {

            var multiplier = this;
            var $container = this.$container;

            var rows = $container.find('.multiply');

            rows.each(function(i, elem) {

                var $inputFields = $(elem).find('input');
                $inputFields.each(function(index, element) {

                    var elemArray = $(element).attr('name');

                    var regex = /\d+([^\[\d+])(\[?([^\d+])+\]?)?$/;
                    var regexSubs = i + ']$2';

                    $(element).attr('name', elemArray.replace(regex, regexSubs))
                        .attr('id', elemArray.replace(regex, regexSubs));

                });

            });

        }

    };

    $.fn[pluginName] = function(options) {
        var args = arguments;

        if (options === undefined || typeof options === 'object') {
            return this.each(function() {
                if (!$.data(this, 'plugin_' + pluginName)) {
                    $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
                }
            });
        } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
            if (Array.prototype.slice.call(args, 1).length === 0 && $.inArray(options, $.fn[pluginName].getters) !== -1) {
                var instance = $.data(this[0], 'plugin_' + pluginName);
                return instance[options].apply(instance, Array.prototype.slice.call(args, 1));
            } else {
                return this.each(function() {
                    var instance = $.data(this, 'plugin_' + pluginName);
                    if (instance instanceof Plugin && typeof instance[options] === 'function') {
                        instance[options].apply(instance, Array.prototype.slice.call(args, 1));
                    }
                });
            }
        }
    };

    var group = '<div class="row multiply-group"><div class="col-sm-1 col"><div class="reorder-handle item-handle action-icon"><span class="glyphicon glyphicon-menu-hamburger"></span></div></div><div class="col-sm-2 col"><input placeholder="Nome do grupo" class="lead group-title" type="text" name="" value=""/></div><div class="col-sm-8 col"><div class="line"></div></div><div class="col-sm-1 col"><div class="group-handle action-icon"><span class="glyphicon glyphicon-list-alt"></span></div></div></div>';

    $.fn[pluginName].defaults = {
        allowGroups: false,
        groupElement: group,
        onMove: function(){
            //log('moving');
        },
        onDrop: function(){
            //log('dropping');
        },
        onCreatingGroup: function(){
            if(this.allowGroups){
                //log('creating group');
            }
        },
        onDeletingGroup: function(){
            if(this.allowGroups){
                //log('deleting group');
            }
        },
        onUpdate: function(){
            //log('updating');
        }
    };


})();
function log(item){
	console.log(item);
}

$(document).ready(function(){

    //handling images
    var $images = $('.images input');
    var $deleteButton = $('.delete-btn');
    var imagesToDelete = [];

    $deleteButton.on('click', function(){
    	var img = $(this).parent().find('img').attr('id');
	    $('.images').append('<input type="hidden" name="imagesToDelete[]" value="' + img + '" />');
	    $(this).parent().remove();
    });

    //member experiences
    var $addExperienceBtn = $('.add-experience');
    var $delExperienceBtn = $('.remove-experience');
    var $experiencesContainer = $('.experiences');

    $('.add-item').on('click', function(){
        $('.item-container').append($item);
    });

    $('.item-container').on('click', '.remove-btn', function() {
        $(this).parent().remove();
    });

    $addExperienceBtn.on('click', function(){
        var $experience = $('.experience');
        var $experienceCount = $experience.length;
        var $newExperience = $('<div class="row experience"><div class="col-xs-2"><input name="experiences[' + $experienceCount + '][start]" value=""></div><div class="col-xs-2"><input name="experiences[' + $experienceCount + '][end]" value=""></div><div class="col-xs-3"><input name="experiences[' + $experienceCount + '][role]" value=""></div><div class="col-xs-3"><input name="experiences[' + $experienceCount + '][company]" value=""></div><div class="col-xs-2 remove-experience">x</div></div>');
        $newExperience.appendTo($experiencesContainer);
    });

    $experiencesContainer.on('click', '.remove-experience', function(){
        $experienceToDel = $(this).parent().find('.experience-id');
        log($experienceToDel.val());
        log($experienceToDel.val() !== undefined);
        if($experienceToDel.val() !== undefined){
            $experiencesContainer.append('<input type="hidden" name="experiencesToDelete[]" value="' + $experienceToDel.val() + '" />')
        }
        $(this).parent().remove();
    });
});
//# sourceMappingURL=admin.js.map
