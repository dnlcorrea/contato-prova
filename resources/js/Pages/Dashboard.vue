<template>
    <app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:px-12 sm:py-12jj">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Create Contact
                    </h2>
                    <form>
                        <div class="sm:px-6">
                            Name: <input type="text" name="name"/>
                        </div>

                        <div>
                            E-mail: <input type="text" name="email"/>

                        </div>

                        <div>
                            Telephone: <input type="text" name="email"/>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
    }
</script>
