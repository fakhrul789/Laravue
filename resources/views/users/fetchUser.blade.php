@extends('layout')

@section('content')
  <div id="UserController" style="padding-top:2em">
    <div class="alert alert-danger" v-if="!isValid">
      <ul>
        <li v-show="!validation.name">Name field is required.</li>
        <li v-show="!validation.email">Input a valid email.</li>
        <li v-show="!validation.address">Address field is required.</li>
      </ul>
    </div>

    <form action="#">

      <div class="form-group">
        <label for="name">Name:</label>
        <input v-model="newUser.name" type="text" id="name" name="name" class="form-control">
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input v-model="newUser.email" type="text" id="email" name="email" class="form-control">
      </div>

      <div class="form-group">
        <label for="address">Address:</label>
        <input v-model="newUser.address" type="text" id="address" name="address" class="form-control">
      </div>

      <div class="form-group">
        <button :disabled="!isValid" type="submit" class="btn btn-default" v-if="!edit" @click="addNewUser">Add New User</button>
        <button :disabled="!isValid" type="submit" class="btn btn-default" v-if="edit" @click="newPerson(newUser.id)">Edit User</button>
      </div>
    </form>

    <transition name="success">
      <div class="alert alert-success" v-if="show">
        <p>Add new user successfully.</p>
      </div>
    </transition>

    <hr>

      <table class="table">
        <thead>
          <th>
            ID
          <th>
            NAME
          </th>
          <th>
            EMAIL
          </th>
          <th>
            ADDRESS
          </th>
          <th>
            CREATED_AT
          </th>
          <th>
            UPDATED_AT
          </th>
          <th>
            CONTROLLER
          </th>
        </thead>

        <tbody>
          <tr v-for='user of users'>
            <td>
              @{{ user.id }}
            </td>
            <td>
              @{{ user.name }}
            </td>
            <td>
              @{{ user.email }}
            </td>
            <td>
              @{{ user.address }}
            </td>
            <td>
              @{{ user.created_at }}
            </td>
            <td>
              @{{ user.updated_at }}
            </td>
            <td>
              <button class="btn btn-default btn-sm" @click="showUser(user.id)">Edit</button>
              <button class="btn btn-danger btn-sm" @click="removeUser(user.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
  </div>
@endsection

@push('scripts')
  <script src="js/script.js" charset="utf-8"></script>
  <style media="screen">
  .success-enter-active, .success-leave-active {
  transition: opacity .5s
  }
  .success-enter, .success-leave-active {
  opacity: 0
  }
  </style>
@endpush
