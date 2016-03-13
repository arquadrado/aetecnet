@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="dashboard">
            <form action="test" method="post" enctype="multipart/form-data">
                <input name="name">
                <input name="category_id">
                <input type="file" name="images[]" multiple>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Submit</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
@stop