<template>
    <div class="p-4">
      <h1 class="text-2xl font-bold mb-4">Alumni Management Dashboard</h1>
      <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
          <tr class="bg-gray-100">
            <th class="border border-gray-300 p-2">Name</th>
            <th class="border border-gray-300 p-2">Email</th>
            <th class="border border-gray-300 p-2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="alumni in alumniList" :key="alumni.id">
            <td class="border border-gray-300 p-2">{{ alumni.name }}</td>
            <td class="border border-gray-300 p-2">{{ alumni.email }}</td>
            <td class="border border-gray-300 p-2">
              <button @click="editAlumni(alumni.id)" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</button>
              <button @click="deleteAlumni(alumni.id)" class="bg-red-500 text-white px-3 py-1 rounded ml-2">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        alumniList: [], // Data fetched from the backend
      };
    },
    methods: {
      async fetchAlumni() {
        const response = await axios.get('/api/alumni');
        this.alumniList = response.data;
      },
      editAlumni(id) {
        this.$router.push(`/edit/${id}`);
      },
      async deleteAlumni(id) {
        if (confirm('Are you sure you want to delete this alumni?')) {
          await axios.delete(`/api/alumni/${id}`);
          this.fetchAlumni(); // Refresh list
        }
      },
    },
    mounted() {
      this.fetchAlumni();
    },
  };
  </script>
  
  <style scoped>
  table {
    border-collapse: collapse;
  }
  th, td {
    text-align: left;
    padding: 8px;
  }
  </style>
  