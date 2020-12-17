<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <title>Contact App by Daniel Correa</title>
</head>
<body>
<div id="app">
    <v-app>
        <v-main>
            <v-form v-model="valid" action="" @submit.native.prevent="submit" method="POST">
                <v-container>
                    <h2>Create new Contact</h2>
                    <v-row>
                        <v-col sm="12">
                            <v-text-field
                                v-model="contact.name"
                                name="name"
                                label="Name"
                                required
                            ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row v-for="(email,i) in contact.emails" :key="i" justify="end">
                        <v-col sm="11">
                            <v-text-field
                                v-model="contact.emails[i]"
                                name="email"
                                label="E-mail"
                                required
                                width="100%"
                            ></v-text-field>
                        </v-col>
                        <v-col sm="1">
                            <v-btn @click="() => removeEmail(i)" fab small depressed color="primary">
                                <v-icon>mdi-minus</v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col sm="12" align="end">
                            <v-btn @click="addEmail" depressed fab small color="primary">
                                <v-icon>mdi-plus</v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>

                    <h3>Telephones</h3>
                    <v-row v-for="(telephone,i) in contact.telephones">
                        <v-col cols="12" sm="4" class="d-flex">
                            <v-combobox
                                name="telephone_type"
                                v-model="telephone.telephone_type"
                                :items="items"
                                label="Telephone Type"
                                item-text="name"
                                item-value="name"
                            />
                        </v-col>
                        <v-col cols="12" sm="7">
                            <v-text-field
                                name="telephone"
                                v-model="telephone.telephone"
                                label="Telephone"
                                class="mb-0"
                            ></v-text-field>
                        </v-col>

                        <v-col cols="12" sm="1">
                            <v-btn @click="() => { removeTelephone(i) }" depressed small fab color="primary">
                                <v-icon>mdi-minus</v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>

                    <v-row>
                        <v-col sm="12" align="end">
                            <v-btn @click="addTelephone" depressed small fab color="primary" depressed>
                                <v-icon>mdi-plus</v-icon>
                            </v-btn>
                        </v-col>

                    </v-row>

                    <v-btn type="submit" color="primary" depressed>create</v-btn>

                </v-container>
            </v-form>

            <br><br><br>

            <v-container>
                <h2>Contacts</h2>


                <v-expansion-panels class="mb-6">
                    <v-expansion-panel
                        v-for="(cont,i) in sortedContacts"
                        :key="i"
                    >
                        <v-expansion-panel-header expand-icon="mdi-menu-down">
                            <v-col sm="12">
                                <v-avatar color="primary" size="40">
                                    <span class="white--text">@{{ initials(cont.name) }}</span>
                                </v-avatar>
                                &nbsp;
                                @{{ cont.name }}
                            </v-col>
                        </v-expansion-panel-header>

                        <v-expansion-panel-content>
                            <strong>Telephones:</strong>
                            <div v-for="(tel,i) in cont.telephones">
                                @{{ tel.telephone }} (@{{ tel.telephone_type.name }})
                            </div>

                            <br>

                            <strong>Emails:</strong>
                            <div v-for="(email,i) in cont.emails">
                                @{{ email.email }}
                            </div>

                            <div>
                                <v-icon class="pointer" color="red" @click="() => { destroy(cont.id) }">mdi-delete
                                </v-icon>
                            </div>

                        </v-expansion-panel-content>
                    </v-expansion-panel>
                </v-expansion-panels>


            </v-container>
        </v-main>

        <v-snackbar v-model="snackbar" timeout="3333">@{{ message }}</v-snackbar>
    </v-app>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.min.js"
        integrity="sha512-DZqqY3PiOvTP9HkjIWgjO6ouCbq+dxqWoJZ/Q+zPYNHmlnI2dQnbJ5bxAHpAMw+LXRm4D72EIRXzvcHQtE8/VQ=="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script>
    const sorter = (a, b) => {
        if (a.name > b.name) return 1;
        if (a.name < b.name) return -1;
        return 0;
    }

    new Vue({
        el: '#app',
        vuetify: new Vuetify(),
        computed: {
            sortedContacts: v => v.contacts.sort(sorter)
        },
        methods: {
            initials(name) {
                const [first, last] = name.split(' ')

                if (!last) return first[0].toUpperCase();

                return first[0].toUpperCase() + last[0].toUpperCase();
            },
            addTelephone() {
                this.contact.telephones.push({
                    telephone: '',
                    telephone_type: ''
                })
            },
            addEmail() {
                this.contact.emails.push('')
            },

            removeEmail(index) {
                const {emails} = this.contact
                if (emails.length === 1) return;
                emails.splice(index, 1);
            },

            removeTelephone(index) {
                const {telephones} = this.contact
                if (telephones.length === 1) return;
                telephones.splice(index, 1);
            },

            destroy(id) {
                if(confirm(`Excluir contato ${this.contacts.find(c => c.id === id).name}?`)) {
                    axios.delete('/contacts/' + id)
                        .then(() => {
                            alert("Contato excluido")
                            this.contacts.splice(this.contacts.findIndex(c => c.id === id), 1)
                        })
                }
            },

            submit() {
                axios.post('/contacts', this.contact)
                    .then(({data}) => {
                        this.contacts.unshift(data)
                        this.snackbar = true
                        this.message = "Contato criado."
                    }).catch(error => {
                    console.error(error)
                });
            }
        },
        data: {
            snackbar: false,
            message: '',
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
