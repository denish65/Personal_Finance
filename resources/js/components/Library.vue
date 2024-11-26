// resources/js/components/Library.vue
<template>
  <div>
    <h1>My Library</h1>
    <input type="file" @change="uploadBook" />
    <div v-for="book in books" :key="book.id">
      <p>{{ book.title }} by {{ book.author }}</p>
      <button @click="downloadBook(book.id)">Download</button>
      <button @click="toggleVisibility(book.id)">
        {{ book.is_hidden ? 'Unhide' : 'Hide' }}
      </button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      books: [],
    };
  },
  mounted() {
    this.fetchBooks();
  },
  methods: {
    fetchBooks() {
      axios.get('/api/books').then((response) => {
        this.books = response.data;
      });
    },
    uploadBook(event) {
      const file = event.target.files[0];
      const formData = new FormData();
      formData.append('file', file);
      formData.append('title', 'Sample Book');
      formData.append('author', 'Unknown');

      axios.post('/api/books', formData).then(() => this.fetchBooks());
    },
    downloadBook(id) {
      window.location = `/api/books/${id}`;
    },
    toggleVisibility(id) {
      axios.post(`/api/books/${id}/toggle-visibility`).then(() => this.fetchBooks());
    },
  },
};
</script>
