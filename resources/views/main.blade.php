@extends('layouts.app')

@section('content')


<div class="container">
<select name="" id="" v-model="activetab">
    <option value="main">main</option>
    <option value="kategorie">kategorie</option>

</select>
 <div v-if="activetab=='main'">
    <read :key="'1'" :modelname="'WSTAW'"></read>
    <edit :key="'2'" :modelname="'WSTAW'"></edit>
 </div>

    
</div>



@endsection
