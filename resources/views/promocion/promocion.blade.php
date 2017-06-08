@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-inline" method="post" action="">
            <div class="form-group">
                <label for="title">title:</label>
                <input type="text" class="form-control" name="title" placeholder="title">
            </div>
            <div class="form-group">
                <label for="description">description:</label>
                <input type="text" class="form-control" name="description" placeholder="description">
            </div>
            <div class="form-group">
                <label for="secondary_description">secondary_description:</label>
                <input type="text" class="form-control" name="secondary_description" placeholder="secondary_description">
            </div>
            <div class="form-group">
                <label for="image">image:</label>
                <input type="text" class="form-control" name="image" placeholder="image">
            </div>
            <div class="form-group">
                <label for="web_page">web_page:</label>
                <input type="text" class="form-control" name="web_page" placeholder="web_page">
            </div>
            <div class="form-group">
                <label for="original_price">Precio Original:</label>
                <input type="number" class="form-control" name="original_price" placeholder="Precio Original">
            </div>
            <div class="form-group">
                <label for="current_price">Precio Actual:</label>
                <input type="number" class="form-control" name="current_price" placeholder="Precio Actual">
            </div>
            <div class="form-group">
                <label for="saving">saving:</label>
                <input type="number" class="form-control" name="saving" placeholder="saving">
            </div>
            <div class="form-group">
                <label for="discount">discount:</label>
                <input type="number" class="form-control" name="discount" placeholder="discount">
            </div>
            <div class="form-group">
                <label for="address">address:</label>
                <input type="text" class="form-control" name="address" placeholder="address">
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>
@endsection
