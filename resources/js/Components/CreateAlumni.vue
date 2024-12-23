<template>
    <div class="p-4">
      <h1 class="text-2xl font-bold mb-4">Add New Alumni</h1>
      <form @submit.prevent="createAlumni" class="space-y-4">
        <div>
          <label for="name" class="block">Name:</label>
          <input v-model="name" type="text" id="name" class="w-full border p-2 rounded" required />
        </div>
        <div>
          <label for="email" class="block">Email:</label>
          <input v-model="email" type="email" id="email" class="w-full border p-2 rounded" required />
        </div>
        <div>
          <label for="file" class="block">Profile Picture:</label>
          <input @change="handleFileUpload" type="file" id="file" class="w-full border p-2 rounded" />
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: '',
        email: '',
        file: null,
      };
    },
    methods: {
      handleFileUpload(event) {
        this.file = event.target.files[0];
      },
      async createAlumni() {
        const formData = new FormData();
        formData.append('name', this.name);
        formData.append('email', this.email);
        if (this.file) {
          formData.append('profile_picture', this.file);
        }
        await axios.post('/api/alumni', formData);
        this.$router.push('/');
      },
    },
  };
  </script>
  