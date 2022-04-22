@extends('voyager::master')

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200&display=swap" rel="stylesheet">
    <style>
        .user-email {
            font-size: .85rem;
            margin-bottom: 1.5em;
        }
        h6{
            padding:15px;
            margin-left:170px;
            margin-right:170px;
            text-align: left;
            font-family:'Source Sans Pro', sans-serif;
            color:#91908e;
            border-width:20px;
            border-bottom: 1px solid black;
            border-bottom-width:thin;
            padding-bottom: 5px;

        }
        .form{
            font-family: font-family: 'Roboto', sans-serif;
            font-weight: bold;
            width: 100%;
            padding: 10px 0;
            background: none;
            border: none;
            border-bottom: 1.5px solid#f0a926;
            color: #5f6363;
            font-size: 18px;
            text-transform: uppercase;
            outline: none;
           
        }
        .titre{
            margin-left:100px;
            display: flex;
            font-family:'Source Sans Pro', sans-serif;
            font-weight: bold;
            flex-direction: column;
            position: relative;
            text-align: left;
            color: #f0a926;
            font-size: 16px;
        }
        .btn btn-primary{
            box-shadow:5px 8px #ccc;
            color:#c2989d;
        }
       
    </style>
       
@stop

@section('content')
    <div style="background-size:cover; background-image: url({{ Voyager::image( Voyager::setting('admin.bg_image'), voyager_asset('/images/bg.jpg')) }}); background-position: center center;position:absolute; top:0; left:0; width:100%; height:300px;"></div>
    <div style="height:160px; display:block; width:100%"></div>
    <div style="position:relative; z-index:9; text-align:center;">
        <img src="@if( !filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( Auth::user()->avatar ) }}@else{{ Auth::user()->avatar }}@endif"
             class="avatar"
             style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
             alt="{{ Auth::user()->name }} avatar">
    <div >
        
        <div class= "form">Profile</div>
        <label class= "titre">Nom </label>
        <h6>{{ ucwords(Auth::user()->name) }}</h6>
        <label class= "titre">Prenom </label>
        <h6>{{ ucwords(Auth::user()->prenom) }}</h6>
        <label class= "titre">Email </label>
        <h6>{{ ucwords(Auth::user()->email) }}</h6>
        <label class= "titre">CIN  </label>
        <h6>{{ ucwords(Auth::user()->cin) }}</h6>
        <label class= "titre">Numero de departement</label>
        <h6>{{ ucwords(Auth::user()->numDRPP) }}</h6>
        <label class= "titre">Date de recrutement</label>
        <h6>{{ ucwords(Auth::user()->dateRecrutement) }}</h6>
        <label class= "titre">Date de naissance </label>
        <h6>{{ ucwords(Auth::user()->dateNaissance) }}</h6>
        <label class= "titre">Professeur appartiennant a l'ENSA  </label>
        <h6>{{ ucwords(Auth::user()->profappaensa) }}</h6>
        <label class= "titre">Structure de recherche </label>
        <h6> {{ ucwords(Auth::user()->structureRecherche) }}</h6>
        <label class= "titre">Directeur de la Structure de Recherche </label>
        <h6>{{ ucwords(Auth::user()->DirecteurStructureRecherche) }}</h6>
        <<label class= "titre">Specialite </label>
        <h6>{{ ucwords(Auth::user()->specialite) }}</h6>
        <label class= "titre">Telephone </label>
        <h6>{{ ucwords(Auth::user()->telephone) }}</h6>
        
    </div>

        <div class="user-email text-muted"></div>
        <p>{{ Auth::user()->bio }}</p>
        @if ($route != '')
            <a href="{{ $route }}" class="btn btn-primary">Modifier mon profile</a>
        @endif
    </div>
@stop