<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Création Dossier avec Id Agence</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    </head>
    <body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Navbar</a>
    </nav>
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                Formulaire de souscription
              </div>
              <div class="card-body">
                  <form action="{{route('store.dossier')}}" method="POST">
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
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Agence</th>
                    <th scope="col">Date de création</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($dossiers as $dossier)
                    <tr>
                      <th scope="row">{{$dossier->d_id}}</th>
                      <td>{{$dossier->d_nom}}</td>
                      <td>{{$dossier->d_prenom}}</td>
                      <td>{{$dossier->agences->ag_nom}}</td>
                      <td>{{$dossier->created_at}}</td>
                    </tr> 
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
          <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    </body>
</html>
