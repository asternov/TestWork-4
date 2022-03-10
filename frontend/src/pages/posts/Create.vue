<template>
  <q-page padding>
    <div class="column">
      <div class="row">
        <q-card square bordered class="q-pa-lg shadow-1">
          <q-card-section>
            <q-form class="q-gutter-md">
              <q-input square filled clearable v-model="title" type="text" label="title" />
              <textarea v-model="body"> </textarea>
            </q-form>
          </q-card-section>
          <q-card-actions class="q-px-md">
            <q-btn unelevated color="light-green-7" size="lg" class="full-width" label="Create" />
          </q-card-actions>
          <q-card-section class="text-center q-pa-none">
            <p class="text-grey-6">Not reigistered? Created an Account</p>
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
      title: '',
      body: ''
    }
  },
  methods: {
    async getPosts () {
      var posts = await api.get()
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
