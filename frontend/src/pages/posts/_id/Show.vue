<template>
  <q-page padding>
    <div class="column">
      <div class="row">
        <q-card square bordered class="q-pa-lg shadow-1">
          <q-card-section>
            <q-form class="q-gutter-md">
              <q-input square filled clearable v-model="email" type="email" label="email" />
              <q-input square filled clearable v-model="password" type="password" label="password" />
            </q-form>
          </q-card-section>
          <q-card-actions class="q-px-md">
            <q-btn unelevated color="light-green-7" size="lg" class="full-width" label="Login" />
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
import { api } from '../../../boot/axios'

export default {
  name: 'Login',
  data () {
    return {
      email: '',
      password: '',
      posts: []
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
    }
  },
  mounted: function () {
    // eslint-disable-next-line @typescript-eslint/no-unsafe-call
    this.getPost()
  }
}
</script>
