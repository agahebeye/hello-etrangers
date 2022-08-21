<script setup>
import AuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import NavLink from '@/Components/NavLink.vue';
import { reactive, ref } from 'vue';

defineProps({
    foreigners: Array,
    role: String,
});

const open = ref(false);

const datatables = reactive({
    headings: [
        {
            'key': 'userId',
            'value': 'ID'
        },
        {
            'key': 'firstName',
            'value': 'Nom'
        },
        {
            'key': 'lastName',
            'value': 'Prénom'
        },
        {
            'key': 'emailAddress',
            'value': 'Email'
        },
        {
            'key': 'gender',
            'value': 'Sexe'
        },
        {
            'key': 'citizenship',
            'value': 'Nationalité'
        }
    ],
    users: [{
        "userId": 1,
        "firstName": "Cort",
        "lastName": "Tosh",
        "emailAddress": "ctosh0@github.com",
        "gender": "Male",
        "phoneNumber": "327-626-5542"
    }, {
        "userId": 2,
        "firstName": "Brianne",
        "lastName": "Dzeniskevich",
        "emailAddress": "bdzeniskevich1@hostgator.com",
        "gender": "Female",
        "phoneNumber": "144-190-8956"
    }, {
        "userId": 3,
        "firstName": "Isadore",
        "lastName": "Botler",
        "emailAddress": "ibotler2@gmpg.org",
        "gender": "Male",
        "phoneNumber": "350-937-0792"
    }, {
        "userId": 4,
        "firstName": "Janaya",
        "lastName": "Klosges",
        "emailAddress": "jklosges3@amazon.de",
        "gender": "Female",
        "phoneNumber": "502-438-7799"
    }, {
        "userId": 5,
        "firstName": "Freddi",
        "lastName": "Di Claudio",
        "emailAddress": "fdiclaudio4@phoca.cz",
        "gender": "Female",
        "phoneNumber": "265-448-9627"
    }, {
        "userId": 6,
        "firstName": "Oliy",
        "lastName": "Mairs",
        "emailAddress": "omairs5@fda.gov",
        "gender": "Female",
        "phoneNumber": "221-516-2295"
    }, {
        "userId": 7,
        "firstName": "Tabb",
        "lastName": "Wiseman",
        "emailAddress": "twiseman6@friendfeed.com",
        "gender": "Male",
        "phoneNumber": "171-817-5020"
    }, {
        "userId": 8,
        "firstName": "Joela",
        "lastName": "Betteriss",
        "emailAddress": "jbetteriss7@msu.edu",
        "gender": "Female",
        "phoneNumber": "481-100-9345"
    }, {
        "userId": 9,
        "firstName": "Alistair",
        "lastName": "Vasyagin",
        "emailAddress": "avasyagin8@gnu.org",
        "gender": "Male",
        "phoneNumber": "520-669-8364"
    }, {
        "userId": 10,
        "firstName": "Nealon",
        "lastName": "Ratray",
        "emailAddress": "nratray9@typepad.com",
        "gender": "Male",
        "phoneNumber": "993-654-9793"
    }, {
        "userId": 11,
        "firstName": "Annissa",
        "lastName": "Kissick",
        "emailAddress": "akissicka@deliciousdays.com",
        "gender": "Female",
        "phoneNumber": "283-425-2705"
    }, {
        "userId": 12,
        "firstName": "Nissie",
        "lastName": "Sidnell",
        "emailAddress": "nsidnellb@freewebs.com",
        "gender": "Female",
        "phoneNumber": "754-391-3116"
    }, {
        "userId": 13,
        "firstName": "Madalena",
        "lastName": "Fouch",
        "emailAddress": "mfouchc@mozilla.org",
        "gender": "Female",
        "phoneNumber": "584-300-9004"
    }, {
        "userId": 14,
        "firstName": "Rozina",
        "lastName": "Atkins",
        "emailAddress": "ratkinsd@japanpost.jp",
        "gender": "Female",
        "phoneNumber": "792-856-0845"
    }, {
        "userId": 15,
        "firstName": "Lorelle",
        "lastName": "Sandcroft",
        "emailAddress": "lsandcrofte@google.nl",
        "gender": "Female",
        "phoneNumber": "882-911-7241"
    }],
    selectedRows: [],
})
</script>

<template>

    <Head title="Documents" />

    <AuthenticatedLayout>
        <template #header>
            <h2 v-if="role" class="text-xl font-semibold leading-tight text-gray-800">
                {{ role }}s
            </h2>

            <h2 v-else class="text-xl font-semibold leading-tight text-gray-800">
                Tous les étrangers
            </h2>
        </template>

        <div class="py-8 prose max-w-none">

            <div class="container px-4 py-6 mx-auto">
                <div v-show="datatables.selectedRows.length" class="fixed top-0 left-0 right-0 z-40 w-full bg-teal-200 shadow">
                    <div class="container px-4 py-4 mx-auto">
                        <div class="flex md:items-center">
                            <div class="flex-shrink-0 mr-4">
                                <svg class="w-8 h-8 text-teal-600" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div v-html="datatables.selectedRows.length + ' rows are selected'" class="text-lg text-teal-800"></div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex-1 pr-4">
                        <div class="relative md:w-1/3">
                            <input type="search"
                                class="w-full py-2 pl-10 pr-4 font-medium text-gray-600 rounded-lg shadow focus:outline-none focus:shadow-outline"
                                placeholder="Search...">
                            <div class="absolute top-0 left-0 inline-flex items-center p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                    <circle cx="10" cy="10" r="7" />
                                    <line x1="21" y1="21" x2="15" y2="15" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="flex rounded-lg shadow">
                            <div class="relative">
                                <button @click.prevent="open = !open"
                                    class="inline-flex items-center px-2 py-2 font-semibold text-gray-500 bg-white rounded-lg hover:text-blue-500 focus:outline-none focus:shadow-outline md:px-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 md:hidden" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                        <path
                                            d="M5.5 5h13a1 1 0 0 1 0.5 1.5L14 12L14 19L10 16L10 12L5 6.5a1 1 0 0 1 0.5 -1.5" />
                                    </svg>
                                    <span class="hidden md:block">Display</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                                        <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </button>

                                <div v-show="open" @click="open = false"
                                    class="absolute top-0 right-0 z-40 block w-40 py-1 mt-12 -mr-1 overflow-hidden bg-white rounded-lg shadow-lg">
                                    <template v-for="heading in datatables.headings">
                                        <label
                                            class="flex items-center justify-start px-4 py-2 text-truncate hover:bg-gray-100">
                                            <div class="mr-3 text-teal-600">
                                                <input type="checkbox" class="form-checkbox focus:outline-none focus:shadow-outline" checked @click="false">
                                            </div>
                                            <div class="text-gray-700 select-none" v-text="heading.value"></div>
                                        </label>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative overflow-x-auto overflow-y-auto bg-white rounded-lg shadow"
                    style="height: 600px;">
                    <table class="relative w-full m-0 whitespace-no-wrap bg-white border-collapse table-auto table-striped">
                        <thead>
                            <tr class="text-left">
                                <template v-for="heading in datatables.headings">
                                    <th class="sticky top-0 px-6 py-2 text-xs font-bold tracking-wider text-gray-600 uppercase bg-gray-100 border-b border-gray-200"
                                        v-text="heading.value" x-ref="heading.key" :class="{ [heading.key]: true }"></th>
                                </template>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="user in datatables.users" :key="user.userId">
                                <tr>
                                    <td class="border-t border-gray-200 border-dashed userId">
                                        <span class="px-4 text-gray-700 " v-text="user.userId"></span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed firstName">
                                        <span class="px-4 text-gray-700 " v-text="user.firstName + 'xxx'"></span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed lastName">
                                        <span class="px-4 text-gray-700 " v-text="user.lastName"></span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed emailAddress">
                                        <span class="px-4 text-gray-700 "
                                            v-text="user.emailAddress"></span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed gender">
                                        <span class="px-4 text-gray-700 "
                                            v-text="user.gender"></span>
                                    </td>
                                    <td class="border-t border-gray-200 border-dashed phoneNumber">
                                        <span class="px-4 text-gray-700 "
                                            v-text="user.phoneNumber"></span>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>