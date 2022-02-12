<template>
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ 'Edit user: ' + selectedUser.name }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Example input" v-model='selectedUser.name'>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Another input" v-model='selectedUser.email'>
                        </div>
                        <div class="form-group">
                            <label for="email">Gender</label>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male"  v-model='selectedUser.gender'>
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" v-model='selectedUser.gender'>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="active">Status</label>
<!--                            <div class="custom-control custom-switch">-->
<!--                                <label class="custom-control-label" for="active">Active</label>-->
<!--                                <input type="checkbox" class="custom-control-input" id="active" v-model='selectedUser.active'>-->
<!--                            </div>-->
                            <div class='form-check form-switch'>
                                <input class='form-check-input'  role="switch" type='checkbox' id='active' v-model='selectedUser.active'>
                                <label class='form-check-label' for='active'>Active</label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @click="editUser">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
let selectedUser;
export default {
    name: "ModalComponent",
    props: {selectedUser},
    data: function(){
      return {
          baseUrl:  'http://localhost:8000/api/'
      }
    },
    methods: {
        /**
         * edit user by id
         * @returns {Promise<void>}
         */
        async editUser(){
            try {
                this.selectedUser.status = this.selectedUser.active? 'active' : 'inactive';
                const response = await axios.put(this.baseUrl+'users/' + this.selectedUser._id , this.selectedUser);
                if(response.data === 1){
                    location.reload();
                }
            }catch (e) {

            }

        },
    },
}
</script>

<style scoped>

</style>
