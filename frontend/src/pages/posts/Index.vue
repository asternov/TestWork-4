<template>
  <q-page padding>
    <div class="column"  v-for="item in posts" v-bind:key="item.id">
      <div class="row">
        <q-card square bordered class="q-pa-lg shadow-1">
          <q-card-actions class="q-px-md">
            <q-btn unelevated color="light-green-7" size="lg" class="full-width" v-html="item.title" @click="$router.replace(link)"/>
          </q-card-actions>
          <q-card-section>
            <div v-html="item.body"></div>
          </q-card-section>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
import { api } from '../../boot/axios'

export default {
  name: 'Login',
  data () {
    return {
      posts: []
    }
  },
  methods: {
    async getPosts () {
      var posts = await api.get('posts')
      // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment
      this.posts = posts.data
    }
  },
  mounted: function () {
    // eslint-disable-next-line @typescript-eslint/no-unsafe-call
    this.getPosts()
  }
}
</script>
