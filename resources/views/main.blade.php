@extends('layouts.app')

@section('content')


<div class="container">
<select name="" id="" v-model="activetab">
    <option value="main">main</option>
    <option value="kategorie">kategorie</option>

</select>
 <div v-if="activetab=='main'">
    <read :key="'1'" :modelname="''"></read>
    <edit :key="'2'":schemat="dummyarray" :modelname="''"></edit>
 </div>
 <div v-if="activetab=='kategorie'">
    <read :key="'3'":modelname="''"></read>
    <edit :key="'4'":schemat="dummyarray" :modelname="''"></edit>
 </div>
    
</div>



@endsection
