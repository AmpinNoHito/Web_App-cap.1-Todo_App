<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="icon" href="{{ asset('img/favicon.ico') }}">
</head>
<body>
  <div class="todo__inner">
    <p class="todo__title">Todo List</p>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <p class="todo__error-message">{{$error}}</p>
        @endforeach
    @endif
    <form action="/todo/create" method="post" class="todo__create">
      @csrf
      <input type="text" name="content" class="todo__create-input">
      <button class="btn btn--create">
        追加
      </button>
    </form>
    <table class="table">
      <tr>
        <th class="table__header">作成日</th>
        <th class="table__header">タスク名</th>
        <th class="table__header table__header--update">更新</th>
        <th class="table__header table__header--delete">削除</th>
      </tr>
      @if (count($items) > 0)
        @foreach ($items as $item)
          <tr>
            <td class="table__data">
              {{$item->created_at}}
            </td>
            <td class="table__data">
              <form method="post" id="edit{{$item->id}}">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <input type="text" name="content" value="{{$item->content}}" class="table__input">
              </form>
              <div class="table__hidden-btn">
                <button form="edit{{$item->id}}" formaction="/todo/update" class="btn btn--update">
                  更新
                </button>
                <button form="edit{{$item->id}}" formaction="/todo/delete" class="btn btn--delete">
                  削除
                </button>
              </div>
            </td>
            <td class="table__data table__data--btn">
              <button form="edit{{$item->id}}" formaction="/todo/update" class="btn btn--update">
                更新
              </button>
            </td>
            <td class="table__data table__data--btn">
              <button form="edit{{$item->id}}" formaction="/todo/delete" class="btn btn--delete">
                削除
              </button>
            </td>
          </tr>
        @endforeach
      @endif
    </table>
  </div>
</body>
</html>