<template>
    <h1>Replies for: {{ topic.title }}</h1>
    <form @submit.prevent="reply(topic.id)" class="reply-form">
        <input v-model="replyForms[topic.id]" type="text" placeholder="Reply..." class="input-reply" />
        <button class="btn-reply">Reply</button>
    </form>

    <div v-if="replies.length === 0">No replies yet.</div>
    <div v-else>
        <div v-for="reply in replies" :key="reply.id" class="reply-card">
            <p class="reply-content">{{ reply.content }}</p>
            <p class="reply-author">- {{ reply.user.name}}</p>
        </div>
    </div>

</template>

<script setup>

import { useForm } from '@inertiajs/inertia-vue3'
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'


const replyForms = ref({})


function reply(topicId) {
  const content = replyForms.value[topicId]
  Inertia.post(window.route('replies.store', topicId), { content }, {
    onSuccess: () => replyForms.value[topicId] = ''
  })
}

defineProps({
    replies:Array,
    topic: Object,
    })
</script>