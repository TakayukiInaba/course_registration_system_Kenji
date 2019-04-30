@extends('layouts.adMain')

@section('title','テーブル設定')

@section('content')
<div class="container">
    <div class="row">
        <h3>「期間」テーブル<h3>
    </div>

  
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="col">
                    <label for="value">表示</label>
                        <select class="form-control" id="value" name="value">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                        </select>      
                </div>
           
                <div class="col">
                    <label for="st_month">開始月</label>
                        <select class="form-control" id="st_month" name="st_month">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>   
                </div>

                <div class="col">
                    <label for="st_day">開始日</label><br>
                        <select class="form-control" id="st_day" name="st_day">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                        </select>   
                </div>
           
                <div class="col">
                    <label for="lst_month">終了月</label>
                        <select class="form-control" id="lst_month" name="lst_month">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>   
                </div>

                <div class="col">
                    <label for="lst_day">終了日</label><br>
                        <select class="form-control" id="lst_day" name="lst_day">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                            <option>16</option>
                            <option>17</option>
                            <option>18</option>
                            <option>19</option>
                            <option>20</option>
                            <option>21</option>
                            <option>22</option>
                            <option>23</option>
                            <option>24</option>
                            <option>25</option>
                            <option>26</option>
                            <option>27</option>
                            <option>28</option>
                            <option>29</option>
                            <option>30</option>
                            <option>31</option>
                        </select>   
                </div>

            </div>
            <br>
                <div class="form-row justify-content-end">
                    <div class="col-2">        
                        <button type="submit" class="btn btn-primary btn-block" >登録</button>
                    </div>
                </div>
        </form>
  

        <div class="row">
                <table class="table table-hover ">
                    <thead class="thead-light">
                        <tr>
                            <th>表示</th>
                            <th>開始日</th>
                            <th>終了日</th>
                            <th>修正</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($terms->count() > 0)
                            @foreach ($terms as $term)
                                <tr>
                                    <td>{{$term->value}}</td>
                                    <td> {!! date('n月j日',strtotime($term->st_day)) !!}</td>
                                    <td>{!! date('n月j日',strtotime($term->lst_day)) !!}</td>
                                    <td><a class="btn btn-info" href="{{url('shingaku/edit/'.$term->id)}}" role="button">修正</a></td>
                                    <td><a class="btn btn-danger" href="{{url('shingaku/delete/'.$term->id)}}" role="button">削除</a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            　　</table>
        </div>
</div>
@endsection