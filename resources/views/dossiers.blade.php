@extends('layouts.app')
@section('title', 'SoftDelete')
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
        <h2 class="text-center">Table Avec Soft Delete et Sans : Dossiers::withTrashed()->get();</h2>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Agence</th>
                    <th scope="col">Agence CP</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Effacer le</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dossiers_tout as $dossier)
                    <tr>
                      <th scope="row">{{$dossier->d_id}}</th>
                      <td>{{$dossier->d_nom}}</td>
                      <td>{{$dossier->d_prenom}}</td>
                      <td>{{$dossier->agences->ag_nom}}</td>
                      <td>{{$dossier->agences->ag_cp}}</td>
                      <td>{{$dossier->d_created_at->format('d/m/Y') }}</td>
                      <!-- Si donnée deleted_at alors on formate la date sinon Null -->
                      <td>{{$dossier->d_deleted_at ? $dossier->d_deleted_at->format('d/m/Y h:00') : 'Null' }}</td>
                    </tr> 
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <h2 class="text-center">Table Sans Soft Delete :  Dossiers::all();</h2>
        <div class="row justify-content-md-center">
            <div class="col-md-8">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Agence</th>
                    <th scope="col">Agence CP</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dossiers_sans_soft_delete as $dossier)
                    <tr>
                      <th scope="row">{{$dossier->d_id}}</th>
                      <td>{{$dossier->d_nom}}</td>
                      <td>{{$dossier->d_prenom}}</td>
                      <td>{{$dossier->agences->ag_nom}}</td>
                      <td>{{$dossier->agences->ag_cp}}</td>
                      <td>{{$dossier->d_created_at->format('d/m/Y') }}</td>
                    <td><a class="btn btn-outline-danger" href="{{route('delete.softdelete',$dossier->d_id)}}" role="button" type="submit">Soft Delete</a></td>
                    </tr> 
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <h2 class="text-center">Table Avec Soft Delete : Dossiers::onlyTrashed()->get();</h2>
        <div class="row justify-content-md-center">
          <div class="col-md-8">
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Prénom</th>
                  <th scope="col">Agence</th>
                  <th scope="col">Agence CP</th>
                  <th scope="col">Effacer le</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($dossiers_soft_delete as $dossier)
                  <tr>
                    <th scope="row">{{$dossier->d_id}}</th>
                    <td>{{$dossier->d_nom}}</td>
                    <td>{{$dossier->d_prenom}}</td>
                    <td>{{$dossier->agences->ag_nom}}</td>
                    <td>{{$dossier->agences->ag_cp}}</td>
                    <td>{{$dossier->d_deleted_at->format('d/m/Y h:00') }}</td>
                    <td><a class="btn btn-outline-success" href="{{route('restore.softdelete',$dossier->d_id)}}" role="button" type="submit">Réactiver</a></td>
                  </tr> 
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
@endsection

         
