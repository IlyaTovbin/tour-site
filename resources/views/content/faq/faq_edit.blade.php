@extends('dashboard')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/content/index.css') }}">
@endsection

@section('main_content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Редактировать FAQ</h1>
            <a class="btn btn-secondary" href="{{ url('/faq') }}">Назад</a>
        </div>
        <div>
            <form action="{{ url("/faq/{$faq->id}") }}" method="POST" onsubmit="return validateForm()" class="create-post-form">
                {{ method_field('PUT') }}
                @csrf
                <div class="form-row">
                   <div class="form-group col-md-6">
                    <label for="question">Вопрос:</label>
                    <input type="text" class="form-control" name="question" id="question" value="{{ $faq->question ?? '' }}">
                    <span class="text-danger question"></span>
                   </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                     <label for="answer">Ответ:</label>
                     <input type="text" class="form-control" name="answer" id="answer" value="{{ $faq->answer ?? '' }}">
                     <span class="text-danger answer"></span>
                    </div>
                 </div>
                <button type="submit" class="btn btn-primary">Редактировать</button>
              </form>
        </div>
    </main>  

@stop


@section('script')
<script>
    function validateForm(){
        let valid = true;
        let question = $('#question').val();
        let answer = $('#answer').val();
        if(question.length < 2){
            $('.question').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.title').text('');
        }

        if(answer.length < 2){
            $('.answer').text('пожалуйста заполните это поле');
            valid = false;
        }else{
            $('.answer').text('');
        }

        if(valid) return true;
        return false;
    }

  </script>
@endsection