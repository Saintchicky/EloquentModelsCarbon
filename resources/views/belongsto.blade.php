@extends('layouts.app')
@section('title', 'BelongsTo')
@section('content')
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                Formulaire de souscription
              </div>
              <div class="card-body">
                  <form action="{{route('store.softdelete')}}" method="POST">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="d_nom">Nom</label>
                            <input type="text" name="d_nom" class="form-control" id="d_nom" placeholder="Nom">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="d_prenom">Prénom</label>
                            <input type="text" name="d_prenom" class="form-control" id="inputPassword4" placeholder="Prénom">
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
            </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">BelongsTo</h5>
                    <div class="card-body">
                      <h5 class="card-title">Exemple du Model Dossier</h5>
                      <p class="card-text">
                        Données venant de la table dossiers avec sa clé étrangère d_agence_id
                        <ul>
                            @foreach ($dossiers as $dossier )
                            <li>{{$dossier->d_agence_id}} : sans relation, $dossier->d_agence_id</li>
                            <li>{{$dossier->agences->ag_nom}} : avec relation, dossier->agences->ag_nom</li>  
                            <br> 
                            @endforeach
                        </ul>
                      </p>
                      <p class="card-text">

                      </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection

         
