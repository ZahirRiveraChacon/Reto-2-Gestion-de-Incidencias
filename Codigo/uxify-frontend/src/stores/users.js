import { defineStore } from 'pinia';
import axios from 'axios';
import { API_BASE_URL } from '@/config.js';

export const useUsersStore = defineStore('users', {
  state: () => ({
    usersTotal: 0,
    usersAdmin: 0,
    usersTenico: 0,
    usersOperario: 0,
  }),
  actions: {
    async fetchUsersTotal() {
      try {
        const token = sessionStorage.getItem('token');
        if (!token) {
          throw new Error('Token not found');
        }

        const response = await axios.get(`${API_BASE_URL}/usersCount`, {
          headers: {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${token}`,
          },
        });

        console.log('Usuarios totales:', response.data.total);
        console.log('Usuarios Admin:', response.data.admin);
        console.log('Usuarios Tecnocos:', response.data.tecnico);
        console.log('Usuarios Operarios:', response.data.operario);

        this.usersTotal = response.data.total;
        this.usersAdmin = response.data.admin;
        this.usersTenico = response.data.tecnico;
        this.usersOperario = response.data.operario;

      } catch (error) {
        console.error('Error al obtener usuarios:', error);
      }
    },
  },
});