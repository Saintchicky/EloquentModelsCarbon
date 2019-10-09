@extends('layouts.app')
@section('title', 'ManyTo')
@section('content')
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                Formulaire de Gestion des rôles
              </div>
              <div class="card-body">
              <form action="" method="POST" id="PostForm">
                      @csrf
                      <div class="form-row">
                          <div class="form-group col-md-6">
                                <label for="us_user_id">Utilisateurs</label>
                                <select id="us_user_id" class="form-control" name="us_user_id" onchange="getValue()">
                                  <option selected>Choisissez Utilisateurs</option>
                                  @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>  
                                  @endforeach
                                </select>
                          </div>
                          <div class="form-group col-md-6">
                                <label for="us_profil_id">Profil</label>
                                <select id="us_profil_id" class="form-control" name="us_profil_id">
                                  <option selected>Choisissez un profil</option>
                                  @foreach ($profils as $profil)
                                    <option value="{{$profil->up_id}}">{{$profil->up_type}}</option>  
                                  @endforeach
                                </select>
                          </div>
                      </div>
                      <a class="btn btn-primary" href="vscode://file/C:\Users\lmaltret\Documents\EloquentModelsCarbon\config\app.php:109" role="button" type="submit">Changer Faker en Fr</a>
                      <button type="submit" id="form_sub" class="btn btn-primary float-right">Sauvegarder</button>
                  </form>
              </div>
              @include('dump.dd',[
                'collections'=>$users
            ])
            </div>
          </div>
          <br>
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
                Trie par Profil
              </div>
              <div class="card-body">
                <ul>
                  @foreach ($users as $user)
                  <!-- $user->name si on place la variable ici on a tous les users-->
                    @foreach ($user->users_profils as $profil)
                    <!-- on a des users par profils-->
                    <li>{{$user->name}}</li>
                    <ul><li>{{$profil->up_type}}</li></ul>
                    @endforeach
                  @endforeach
                </ul>
                @foreach($profils_users as $ps)
                @dump($ps)
                @endforeach
              </div>
            </div>
          </div>
          <br>
          <div class="row justify-content-md-center">
              <div class="col-md-12">
                <table class="table table-bordered">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nom Prénom</th>
                      <th scope="col">Changer le profil</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                      <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <!-- Liaison users et users profils-->
                        <td>
                            <form action="{{route('update.manyto',$user->id)}}" method="POST" id="PostForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group">
                                          <select id="us_profil_id" class="form-control" name="us_profil_id">
                                            @foreach ($profils as $profil)
                                              @foreach($user->users_profils as $user_pro)
                                                <option value="{{$profil->up_id}}" @if($user_pro->up_id == $profil->up_id)selected @endif>{{$profil->up_type}}</option>  
                                              @endforeach
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <button type="submit" id="form_sub" class="btn btn-primary float-right">Sauvegarder</button>
                            </form>
                        </td>
                      </tr> 
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>        
          <br>
        <script>
          function getValue()
          {
            var us_user_id = document.getElementById("us_user_id").value;
            // Ajoute l'id dans le submit
            // document.getElementById("form_sub").setAttribute('data-id',us_user_id);
            var postform = document.getElementById("PostForm");
            postform.setAttribute('action','/'+us_user_id+'/manyto');

          }
        </script>
@endsection
