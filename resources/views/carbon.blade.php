@extends('layouts.app')
@section('title', 'Carbon')
@section('content')
<div class="col-md-8">
    <div class="card">
      <div class="card-header">
        Formulaire de souscription
      </div>
      <div class="card-body">
        <p class="card-text">
            <ul>
                <li>Formater une date <a class="btn btn-primary" href="vscode://file/C:\Users\lmaltret\Documents\EloquentModelsCarbon\app\DateTrait.php:13" role="button" type="submit">Voir l'accessor</a></li>
                    <ul>
                    @foreach ($dossiers as $dossier)
                        @if ($loop->first)
                            <li>{{$dossier->format_created_at}} ->
                                    Formater avec un accessor dans Model Dossiers
                                    
                            </li>
                        @endif 
                    @endforeach
                    </ul>
                <br>
                <li>Crée depuis <a class="btn btn-primary" href="vscode://file/C:\Users\lmaltret\Documents\EloquentModelsCarbon\app\DateTrait.php:19" role="button" type="submit">Voir l'accessor</a></li>
                    <ul>
                    @foreach ($dossiers as $dossier)
                     
                            <li>{{$dossier->date_since}} ->
                                    Formater avec un accessor dans Model Dossiers
                            </li>
                    @endforeach
                    </ul>
                <li>
                    L'objet Carbon
                    <ul>
                        <li>
                            Valeur created_at
                            @include('dump.dd',[
                                'collections'=>$carbon_created_at
                            ])
                        </li>
                        <li>
                            Valeur Today
                            @include('dump.dd',[
                                'collections'=>$carbon_today
                            ])
                        </li>
                        <li>
                            Si la date d'aujourd'hui est plus grande que celle en base, true
                            <br>
                            <br>
                                if($carbon_today->gt($carbon_created_at))
                                <br> {
                                <br>     $resultDateGt = "La date d'aujourd'hui est plus grande";
                                <br> }
                           <br><b>Résulat =</b>  {{$resultDateGt}}
                        
                        </li>
                        <li>
                            Si la date d'aujourd'hui est inférieur à celle de la base, true
                                <br>
                                <br>
                                if($carbon_today->lt($carbon_created_at)){
                                <br>    $resultDateLt = "La date d'aujourd'hui est inférieure à celle crée en base";
                                <br>}else{
                                <br>    $resultDateLt = "La date d'aujourd'hui est plus grande que celle crée en base";
                                <br>}  
                           <br><b>Résulat =</b>  {{$resultDateLt}}
                        </li>
                    </ul>
                </li>
            </ul>
        </p>
      </div>
    </div>
    <br>
    @if (\Session::has('success'))
    <div class="alert alert-success" role="alert">
            {!! \Session::get('success') !!}
    </div>
    @endif
    <div class="card">
            <div class="card-header">
             Différence Date
            </div>
        <div class="card-body">
            <form action="{{route('store.date')}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="d_nom">Nom</label>
                      <input type="text" name="d_nom" class="form-control" id="d_nom" placeholder="Nom">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="d_prenom">Prénom</label>
                      <input type="text" name="d_prenom" class="form-control" id="d_prenom" placeholder="Prénom">
                    </div>
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="d_nom">Date début(Colonne formatée en DATE)</label>
                          <input type="date" name="d_date_deb" class="form-control" id="d_date_deb" placeholder="date-début">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="d_prenom">Date Fin (Colonne formatée en VARCHAR)</label>
                          <input type="text" name="d_date_fin" class="form-control" id="d_date_fin" placeholder="date-fin">
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="d_agence_id">Agences</label>
                      <select id="d_agence_id" class="form-control" name="d_agence_id">
                        <option selected>Choisissez une agence</option>
                        @foreach ($agences as $agence)
                          <option value="{{$agence->ag_id}}">{{$agence->ag_nom}}</option>  
                        @endforeach
                      </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Sauvegarder</button>
            </form>
        </div>
        <div class="card-body">
            <ul>
                <li>Faire la différence entre la date de début et fin avec diffInDays()</li>
                <ul>
                    <li>$rest_days = différence entre la date de début et aujourd'hui</li>
                    <li>$total_days = différence entre la date de fin et la date de début</li>
                    <li> Il reste {{$rest_days}} jours sur {{$total_days}} --  Il reste $rest_days jours sur $total_days</li>
                </ul>
            </ul>
        </div>
    </div>
@endsection