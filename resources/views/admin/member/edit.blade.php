@extends('admin.layouts.master')
@section('content')
    <div class="dashboard">
        <form action="{{ route('member_submit') }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ !is_null($member) ? $member->id : null }}" />
            <div class="row">
                <div class="col-xs-8">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="row form-field">
                                <div class="col-xs-12">
                                    <label for="name">Nome</label>
                                </div>
                            </div>
                            <div class="row form-field">
                                <div class="col-xs-12">
                                    <input name="name" value="{{ !is_null($member) ? $member->name : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="row form-field">
                                <div class="col-xs-12">
                                    <label for="name">Função</label>
                                </div>
                            </div>
                            <div class="row form-field">
                                <div class="col-xs-12">
                                    <input name="function" value="{{ !is_null($member) ? $member->function : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                        <label for="">Experiência</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2"><label for="">De</label></div>
                        <div class="col-xs-2"><label for="">Até</label></div>
                        <div class="col-xs-3"><label for="">Função</label></div>
                        <div class="col-xs-3"><label for="">Empresa</label></div>
                    </div>
                    <div class="experiences">
                        @if(!is_null($member))
                        @foreach($member->experiences as $index => $experience)
                        <div class="row experience">
                        <input class="experience-id" type="hidden" name="experiences[{{ $index }}][id]" value="{{ $experience->id }}">
                            <div class="col-xs-2">
                                <input name="experiences[{{ $index }}][start]" value="{{ $experience->start }}">
                            </div>
                            <div class="col-xs-2">
                                <input name="experiences[{{ $index }}][end]" value="{{ $experience->end }}">
                            </div>
                            <div class="col-xs-3">
                                <input name="experiences[{{ $index }}][role]" value="{{ $experience->function }}">
                            </div>
                            <div class="col-xs-3">
                                <input name="experiences[{{ $index }}][company]" value="{{ $experience->institution }}">
                            </div>
                            <div class="col-xs-2 remove-experience">x</div>
                        </div>
                        @endforeach 
                        @endif
                    </div>
                    <a class="add-experience">adicionar experiência</a>
                </div>
                <div class="col-xs-4">
                    <div class="row">
                        <div class="col-xs-12">
                        @if(!is_null($member))
                            <div class="member-image">
                                <img src="{{ is_null($member->image) ? $url.'img/placeholder.jpg' : $url.$member->image }}" alt="">
                            </div>
                        @endif
                        </div>
                        <div class="col-xs-12">
                             <input type="file" name="image" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <button class="form-button" type="submit">Submeter</button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        </form>
        <form action="{{ route('member_delete') }}" method="post" onsubmit="return confirm('Tens a certeza que queres apagar este membro?');">
            <div class="row">
                <div class="col-sm-2">
                     <button class="form-button" type="submit">Apagar</button>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ !is_null($member) ? $member->id : null }}" />
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        </form>
    </div>
@stop