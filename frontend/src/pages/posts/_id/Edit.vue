<template>
  <q-page padding>
    <div class="column">
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
          <q-card-actions class="q-px-md">
            <q-btn unelevated color="light-green-7" size="lg" class="full-width" label="Create" v-on:click="update"/>
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
      body: '',
      id: 0
    }
  },
  methods: {
    async getPost () {
      // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment,@typescript-eslint/no-unsafe-member-access
      this.id = this.$route.params.id
      // eslint-disable-next-line @typescript-eslint/restrict-plus-operands
      var response = await api.get('posts/' + this.id)
      // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment,@typescript-eslint/no-unsafe-member-access
      this.title = response.data.title
      // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment,@typescript-eslint/no-unsafe-member-access
      this.body = response.data.body
    },
    async update () {
      // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment,@typescript-eslint/no-unsafe-member-access
      this.id = this.$route.params.id
      const data = {
        // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment
        id: this.id,
        // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment
        title: this.title,
        // eslint-disable-next-line @typescript-eslint/no-unsafe-assignment
        body: this.body
      }
      // eslint-disable-next-line no-unused-vars,@typescript-eslint/restrict-plus-operands
      var response = await api.post('posts/' + this.id, data)
    }
  },
  mounted: function () {
    // eslint-disable-next-line @typescript-eslint/no-unsafe-call
    this.getPost()
  }
}
</script>
