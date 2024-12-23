<template>
    <div class="p-4">
      <h1 class="text-2xl font-bold mb-4">Edit Alumni</h1>
      <form @submit.prevent="updateAlumni" class="space-y-4">
        <div>
          <label for="name" class="block">Name:</label>
          <input v-model="name" type="text" id="name" class="w-full border p-2 rounded" required />
        </div>
        <div>
          <label for="email" class="block">Email:</label>
          <input v-model="email" type="email" id="email" class="w-full border p-2 rounded" required />
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        email: '',
      };
    },
    async mounted() {
      const response = await axios.get(`/api/alumni/${this.$route.params.id}`);
      this.name = response.data.name;
      this.email = response.data.email;
    },
    methods: {
      async updateAlumni() {
        await axios.put(`/api/alumni/${this.$route.params.id}`, {
          name: this.name,
          email: this.email,
        });
        this.$router.push('/');
      },
    },
  };
  </script>
  