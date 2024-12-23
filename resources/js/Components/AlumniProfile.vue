<template>
    <div class="p-4">
      <h1 class="text-2xl font-bold mb-4">Alumni Profile</h1>
      <div class="border p-4 rounded">
        <h2>Name: {{ alumni.name }}</h2>
        <h3>Email: {{ alumni.email }}</h3>
        <img v-if="alumni.profile_picture" :src="alumni.profile_picture" alt="Profile Picture" class="mt-4 w-32 h-32 rounded-full" />
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        alumni: {},
      };
    },
    async mounted() {
      const response = await axios.get(`/api/alumni/${this.$route.params.id}`);
      this.alumni = response.data;
    },
  };
  </script>
  