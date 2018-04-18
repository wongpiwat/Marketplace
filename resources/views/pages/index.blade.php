@extends('layouts.master')
@push('style')
    <style>
        .my-style {font-size: 1.6em;}
    </style>
@endpush

@section('content')
    <div id="vue-app">
      <a href="/create">Create Market</a><br>
      <a href="/users">Show Users</a><br>
      <a href="/projects">Show Projects</a><br>
      <a href="/categories">Show Categories</a><br>
      <a href="/issues">Show Issues</a><br>
      {{--
        <p>v of VueJS</p>
        <!-- @{{ view ของ JS}} -->
        <p>Number: @{{ number }}</p>
        <p>Text: @{{ text}}</p>
        <div>
            <button class="btn btn-primary" v-on:click="number += 1">Click+1</button>
            <button class="btn btn-primary" v-on:click="increaseNumber">Click+10</button>
        </div>

        <button @click="toggleTimeButton">Toggle</button>

        <div v-if="isShowTimeButton">
            <input v-model="seconds">
            <p>Time: @{{ seconds }} s</p>
            <p>Hour: @{{ hourText }}</p>
            <p>minute: @{{ minuteText }}</p>
            <p>secound: @{{ secoundText }}</p>
            <button class="btn btn-primary" v-on:click="increaseTime">+1 secound</button>
            <button class="btn btn-primary" v-on:click="decreaseTime">-1 secound</button>

            <p>secound: @{{ showTimeText }}</p>
        </div>

        <div>
            <p>Item :<input v-model.trim="item"></p>
            <button @click="appendItem" class="btn btn-xs btn-success">Add item</button>
            <ul class="list-group">
                <!-- in index -->
                <!-- of value -->
                <li class="list-group-item" v-for="todo of todos">
                    <!-- @{{ todo }} -->
                    <example-component heading="Item" :text="todo"></example-component>
                </li>
                <!-- <li v-for="todo in todos">@{{ todo}}</li> -->
            </ul>
        </div>

        <div>
          <example-component text="Text"></example-component>
          <example-component text="Number" v-bind:heading="seconds"></example-component>
        </div>
        --}}
</div>
@endsection

@section('content-bottom')
 {{--
  <div id="page1">Text of content bottom</div>
  --}}
@endsection
