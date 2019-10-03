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
                <li>Formater une date <a class="btn btn-outline-primary" href="vscode://file/C:\Users\lmaltret\Documents\EloquentModelsCarbon\app\Dossiers.php:26" role="button" type="submit">Voir l'accessor</a></li>
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
                <li>Crée depuis <a class="btn btn-outline-primary" href="vscode://file/C:\Users\lmaltret\Documents\EloquentModelsCarbon\app\Dossiers.php:29" role="button" type="submit">Voir l'accessor</a></li>
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
                     
                    </ul>

                </li>
            </ul>
        </p>
      </div>
    </div>
</div>
@endsection