import { createRouter, createWebHistory } from 'vue-router';

// Correct file paths for components
import Dashboard from '../Components/Dashboard.vue';  // Ensure correct lowercase 'components'
import CreateAlumni from '../Components/CreateAlumni.vue';
import EditAlumni from '../Components/EditAlumni.vue';
import AlumniProfile from '../Components/AlumniProfile.vue';

const routes = [
  { path: '/', component: Dashboard },  // Corrected to 'component' instead of 'Component'
  { path: '/create', component: CreateAlumni },
  { path: '/edit/:id', component: EditAlumni },
  { path: '/profile/:id', component: AlumniProfile },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
