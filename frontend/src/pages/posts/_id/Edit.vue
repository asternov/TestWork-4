<template>
  <q-page padding>
    <div class="column">
      <div class="row">
        <h5 class="text-h5 text-white q-my-md">Company & Co</h5>
      </div>
      <div class="row">
        <q-card square bordered class="q-pa-lg shadow-1">
          <q-card-section>
            <q-form class="q-gutter-md">
              <q-input square filled clearable v-model="email" type="email" label="email" />
              <textarea v-model="body"> </textarea>
            </q-form>
          </q-card-section>
          <q-card-actions class="q-px-md">
            <q-btn unelevated color="light-green-7" size="lg" class="full-width" label="Update" />
          </q-card-actions>
        </q-card>
      </div>
    </div>
  </q-page>
</template>

<script>
import { api } from '../../../boot/axios'

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
