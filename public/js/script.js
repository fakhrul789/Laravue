var emailRE = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i

var vm = new Vue({
  http: {
    root: '/root',
    headers: {
      'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('content')
    }
  },

  el: '#UserController',

  data: {
    users : [],
    newUser : {
      id: '',
      name:'',
      email:'',
      address:''
    },
    show : false,
    edit : false
  },

  methods: {

    fetchUser : function(){
      this.$http.get('/api/users').then((response) => {
        this.users = response.data;
      },(response) => {

      });
    },

    showUser : function(id){
      this.edit = true
      this.$http.get('/api/users/' + id).then((data) => {
        this.newUser.id = data.data['id'];
        this.newUser.name = data.data['name'];
        this.newUser.email = data.data['email'];
        this.newUser.address = data.data['address'];
      })
    },

    removeUser:function(id){
      var confirmBox = confirm("Apakah anda yakin ingin menghapus User?")
      if(confirmBox) this.$http.delete('/api/users/' + id)
      this.fetchUser()
    },

    newPerson : function(id){
      var user = this.newUser
      this.newUser = {id:'',name:'',email:'',address:''}
      this.$http.patch('/api/users/'+id,user).then((data) => {
        console.log("sukses");
      })
      this.fetchUser()
      this.edit = false
    },

    addNewUser: function(){
      // User input
      var user = this.newUser

      // Clear user input
      this.newUser = {name:'',email:'',address:''}

      // Send post request
      this.$http.post('/api/users',user)
      self = this
      this.show = true
      setTimeout(function(){
        self.show = false
      },3000)
      // Reload page
      this.fetchUser();
    }

  },

  computed: {
    validation: function(){
      return {
        name: !!this.newUser.name.trim(),
        email: emailRE.test(this.newUser.email),
        address: !!this.newUser.address.trim()
      }
    },

    isValid: function(){
      var validation = this.validation;
      return Object.keys(validation).every(function(key){
        return validation[key]
      })
    }
  },

  mounted: function(){
    this.$nextTick(function(){
      this.fetchUser();
    })
  }
});
