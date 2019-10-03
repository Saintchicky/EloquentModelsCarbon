@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
    <div class="col-md-8">
        <div class="card">
                <div class="card-header">
                 SoftDelete
                </div>
                <div class="card-body">
                  <h5 class="card-title">Effacer sans effacer</h5>
                  <p class="card-text">Permet de retrouver la donnée sans la supprimer totalement de la table</p>
                  <a class="btn btn-outline-primary" href="{{route('show.softdelete')}}" role="button" type="submit">SofDelete</a>
                </div>
        </div>
        <br>
        <div class="card">
                <div class="card-header">
                 Relation 1:1 entre deux tables "BelongsTo"
                </div>
                <div class="card-body">
                  <h5 class="card-title">La clé étrangère appartient à</h5>
                  <p class="card-text">Fais la relation entre la table possedant une clé étrangère et la table de référence</p>
                  <a class="btn btn-outline-primary" href="{{route('show.belongsto')}}" role="button" type="submit">Voir Relation</a>
                </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                Carbon
            </div>
            <div class="card-body">
              <h5 class="card-title">Formater et traitement des dates</h5>
              <p class="card-text">Permet de reformater une date, de faire des comparaisons et d'autres fonctions</p>
              <a class="btn btn-outline-primary" href="{{route('show.carbon')}}" role="button" type="submit">Voir Carbon</a>
            </div>
        </div>
    </div>
@endsection