<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('log')->only('index');
    //     $this->middleware('subscribed')->except('store');
    // }
    public function show(string $id): Response
    {
        return Inertia::render('Users/Profile',[
            'user' => User::findOrFail($id)
        ]);
    }
    // public function show(string $id)
    // {
    //     return view('user.profile', [
    //         'user' => User::findOrFail($id)
    //     ]);
    // }

}


// <template>
//   <div class="min-h-screen bg-gray-100 p-8">
//     <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-6">
//       <h1 class="text-2xl font-bold mb-4">User Profile</h1>
//       <div v-if="user">
//         <p><strong>ID:</strong> {{ user.id }}</p>
//         <p><strong>Name:</strong> {{ user.name }}</p>
//         <p><strong>Email:</strong> {{ user.email }}</p>
//         <p><strong>Created At:</strong> {{ formatDate(user.created_at) }}</p>
//         <p><strong>Updated At:</strong> {{ formatDate(user.updated_at) }}</p>
//       </div>
//       <div v-else>
//         <p class="text-red-500">User not found.</p>
//       </div>
//     </div>
//   </div>
// </template>

// <script setup>
// defineProps({
//   user: Object
// })

// const formatDate = (dateStr) => {
//   return new Date(dateStr).toLocaleString()
// }
// </script>

// <style scoped>
// /* Optional extra styles */
// </style>





// <script setup>
//     import Layout from '@/Layouts/Authenticated.vue';
//     import {Head} from '@inertiajs/vue3';

//     const props = defineProps(['user']);
// </script>

// <template>
//     <Head title="User Profile" />
//     <Layout>
//         <template #header>
//             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
//                 Profile
//             </h2>
//         </template>
//         <div class="py-12">
//             Hello, {{ user.name }}
//         </div>
//     </Layout>
// </template>
