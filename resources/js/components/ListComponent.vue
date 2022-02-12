<template>
    <div class="col-md-12">
        <button class="btn btn-primary mb-2" @click="RefreshUsersData">Refresh</button>
        <ul class="list-group">
            <li class="list-group-item mb-1 list-items" v-for='user in users' :key="users._id">
                {{ user.name }}
                <div class="float-right">
                    <button class="btn btn-primary float-left mr-1" @click="selected = user" data-toggle="modal" data-target="#updateModal">Details</button>
                    <button class="btn btn-danger float-right" @click="deleteUser(user._id)">Delete</button>
                </div>
            </li>

        </ul>

        <modal-component :selectedUser="selected"></modal-component>
    </div>



</template>

<script>
import ModalComponent from "./ModalComponent";
export default {
    name: "ListComponent",
    components: {ModalComponent},
    data: function(){
        return {
            selected: '',
            users: [],
            baseUrl:  'http://localhost:8000/api/',
            externalUrl: 'https://gorest.co.in/public/v1/users'
        }
    },
    methods:{
        /**
         * get users from given api
         * @returns {Promise<*>}
         */
        async getExternalUserData(){
            try{
                return await axios.get(this.externalUrl);
            }catch (e) {
                console.log(e);
            }
        },

        /**
         * get users from mongodb
         * @returns {Promise<void>}
         */
        async getUserData(){
            try{
                const response = await axios.get(this.baseUrl+'users');
                if(!response.data.length){
                    await this.RefreshUsersData();
                }else{
                    this.users = response.data;
                }
            }catch (e) {
                console.log(e);
            }
        },

        /**
         * Refreshing users data
         * @returns {Promise<void>}
         * @constructor
         */
        async RefreshUsersData(){
            try{
                const externalUsers = await this.getExternalUserData();
                await axios.post(this.baseUrl+'refresh', externalUsers.data.data)
                    .then(function(response){
                        if(response.data === 1){
                            location.reload();
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            }catch (e) {

            }

        },

        /**
         * Deleting a user
         * @param id
         * @returns {Promise<void>}
         */
        async deleteUser(id){
            try {
                const response = await axios.delete(this.baseUrl+'users/' + id);
                if(response.data === 1){
                    location.reload();
                }
            }catch (e) {

            }

        }
    },
    created() {
        this.getUserData();
    },

}
</script>

<style>
    .list-items{
        border-top-width: 1px!important;
    }
</style>

