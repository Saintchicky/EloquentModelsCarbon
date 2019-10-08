@extends('layouts.app')
@section('title', 'ManyTo')
@section('content')
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                Formulaire de Gestion des rôles
              </div>
              <div class="card-body">
                  <form action="" method="POST">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-6">
                                <label for="d_agence_id">Utilisateurs</label>
                                <select id="d_agence_id" class="form-control" name="d_agence_id">
                                  <option selected>Choisissez Utilisateurs</option>
                                  @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>  
                                  @endforeach
                                </select>
                          </div>
                          <div class="form-group col-md-6">
                                <label for="d_agence_id">Agences</label>
                                <select id="d_agence_id" class="form-control" name="d_agence_id">
                                  <option selected>Choisissez un profil</option>
                                  @foreach ($users->users_profils as $profil)
                                    <option value="{{$profil->up_id}}">{{$profil->up_type}}</option>  
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
@endsection
