<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
<div id="app">
    <v-app>
        <v-main>
            <v-form v-model="valid" action="" @submit.native.prevent="submit" method="POST">
                <v-container>
                    <h2>Create new Contact</h2>
                    <v-btn @click="addEmail">add e-mail</v-btn>
                    <v-row>
                        <v-col cols="12" md="4">
                            <v-text-field
                                v-model="contact.name"
                                label="Name"
                                required
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" md="4">
                            <div v-for="(email,i) in contact.emails" :key="i">
                                <v-text-field
                                    v-model="contact.emails[i]"
                                    label="E-mail"
                                    required
                                ></v-text-field>
                            </div>
                        </v-col>
                    </v-row>

                    <h3>Telephones</h3>
                    <v-btn @click="addTelephone">add</v-btn>
                    <v-row v-for="(telephone,i) in contact.telephones">
                        <v-col cols="12" sm="4" class="d-flex">
                            <v-select
                                :items="items"
                                v-model="telephone.telephone_type"
                                filled
                                label="Telephone Type"
                                item-text="name"
                                item-value="id"
                            ></v-select>
                        </v-col>
                        <v-col cols="12" sm="4">
                            <v-text-field
                                v-model="telephone.telephone"
                                filled
                                label="Telephone"
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-btn type="submit">create</v-btn>

                </v-container>
            </v-form>

            <br><br><br>

            <v-container>
                <h2>Contacts</h2>

                <div v-for="(cont,i) in contacts">
                    <p>Name: @{{ cont.name }}</p>
                    <p>Telephones:</p>
                    <div v-for="(t,i) in cont.telephones" :key="i">
                        @{{t.telephone}} (@{{ t.telephone_type.name }})
                    </div>
                    <p>Emails:</p>
                    <div v-for="(e,i) in cont.emails" :key="i">
                        @{{e.email}}
                    </div>
                    <hr>
                </div>
            </v-container>
        </v-main>
    </v-app>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"
        integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ=="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
    new Vue({
        el: '#app',
        vuetify: new Vuetify(),
        methods: {
            addTelephone() {
                this.contact.telephones.push({
                    telephone: '',
                    telephone_type: ''
                })
            },
            addEmail() {
                this.contact.emails.push('')
            },

            submit() {
                axios.post('/contacts', this.contact)
            }
        },
        data: {
            valid: true,
            contacts: [],
            contact: {
                name: '',
                emails: [''],
                telephones: [{
                    telephone: '',
                    telephone_type: ''
                }]
            },
            items: [
                {id: 1, name: "Foobie"},
                {id: 2, name: "Rarzie"},
            ]
        },
        created() {
            axios.get('/telephone-types')
                .then(({data}) => {
                    this.items = data
                });

            axios.get('/contacts')
                .then(({data}) => {
                    this.contacts = data
                });
        }
    })
</script>
</body>
</html>
