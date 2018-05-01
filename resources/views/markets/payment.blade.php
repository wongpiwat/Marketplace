@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-md-2" ></div>
  <div class="col-md-8" >
    <div class="card" style="width:100%">
      <div class="card-header" style="background-color:#FA8072"></div>
      <div class="card-header" > <h1>PAYMENT</h1></div>
      <div class="card-body">
        <table class="table table-bordered ">
    <thead class="thead">
      <tr>
        <th style="width:0px; display:none"></th>
        <th style="display:none;"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="radio">
          <input type="radio" checked name="optradio">
          </div>
        </td>
        <td>
        <div class="row">
          <div class="col-md-4">
           <img src="http://www.toro.in.th/wp-content/uploads/2017/04/Screen-Shot-2560-04-14-at-9.53.40-AM.png" style="width:250px;height:120px;">
          </div>
          <div class="col-md-8">
            <br><br><br><br><br>
            <p style="display:inline-block;"> </p></span>
          </div>
        </div>
        </td>

      </tr>
      <tr>
        <td>
          <div class="radio">
          <input type="radio" name="optradio">
          </div>
        </td>
        <td>
          <div class="row">
            <div class="col-md-4">
             <img src="https://tweedutyfree.com/css/site/images/visa_mastercard_logo.png" style="width:250px;height:100px;">
            </div>
            <div class="col-md-8">
              <br><br><br><br><br>
              <p style="display:inline-block;"></p></span>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="radio">
          <input type="radio" name="optradio">
          </div>
        </td>
        <td>
          <div class="row">
            <div class="col-md-4">
             <img src="https://i0.wp.com/www.itunesgiftcard.in.th/wp-content/uploads/2012/02/counterservice-7-11.png?resize=338%2C139" style="width:250px;height:100px;">
            </div>
            <div class="col-md-8">
              <br><br><br><br><br>
              <p style="display:inline-block;"></p></span>
            </div>
        </td>
      </tr>
    </tbody>
  </table>
      </div>
    </div>
    <div class="card-footer" style="padding-bottom:7%;">
      <a href="../" style="float:left;" class="btn btn-danger">BACK</a>
        <!-- <a href="" class="btn btn-info" style="float:right; "></a> -->
        <form action="{{ url('/markets/'.$market->id.'/'.$reservation->id.'/pay') }}" method="post" class="has-confirm" data-message="Confirm to pay for reservation?">
          @csrf
          @method('PUT')
          <button class="btn btn-info" style="float:right;" type="submit" name="button">Pay</button>
        </form>

    </div>
</div>
</div>
</div>
@endsection
