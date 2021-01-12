
<!doctype html>
<html lang="en" ng-app="userRecords">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Alied Users</title>

    <!-- Latest compiled and minified CSS -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>

  <body>
    <div>&nbsp;</div>
    <div class="container" ng-controller="UserController">
      <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <form class="form-inline" action="/action_page.php">
                <div class="form-group">
                  <input class="form-control form-control-dark w-10" type="text" placeholder="Search Here" aria-label="Search Here">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>
          </div>
          <hr>
          <div class="table-responsive">
            <table class="table table-bordered text-center table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Department</th>
                  <th>City</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @if(!empty($userdata) && $userdata->count())
                @foreach($userdata as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->userName }}</td>
                        <td>{{ $value->userName }}</td>
                        <td>{{ $value->userName }}</td>
                        <td>{{ $value->userName }}</td>
                        <td>
                            <button class="btn btn-info" ng-click="toggle('edit', {{ $value->id }})">Edit</button>
                            <button class="btn btn-danger" ng-click="confirmDelete({{ $value->id }})">Delete</button>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <td colspan="10">There are no data.</td>
                    </tr>
                @endif
              </tbody>
            </table>
            {!! $userdata->links() !!}
          </div>
            
        </main>
      </div>
        <!-- Modal -->
        <div class="modal" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form name="frmcustomers" class="" novalidate="">
                    <div class="form-group error">
                        <label for="inputEmail3" class="col-sm-12 control-label">User Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control
                                has-error" id="name" name="name"
                                placeholder="Fullname"
                                value=""
                                ng-model="customer.name"
                                ng-required="true">
                            <span class="help-inline">Name field is required</span>
                        </div>
                    </div>
                    
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>
    </div>
    

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-animate.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular-route.min.js"></script>

        <script src="{{asset('js/user.js')}}"></script>

  </body>
</html>
