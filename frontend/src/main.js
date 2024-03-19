new Vue({
    el: '#app',
    data: {
      todos: [],
      newTodo: ''
    },
    mounted() {
      this.fetchTodos();
    },
    methods: {
      fetchTodos() {
        axios.get('http://localhost:44301/api/todos')
          .then(response => {
            this.todos = response.data;
          })
          .catch(error => {
            console.error('Error fetching todos:', error);
          });
      },
      addTodo() {
        axios.post('http://localhost:44301/api/todos', { text: this.newTodo })
          .then(response => {
            this.todos.push(response.data);
            this.newTodo = '';
          })
          .catch(error => {
            console.error('Error adding todo:', error);
          });
      },
      deleteTodo(id) {
        axios.delete(`http://localhost:44301/api/todos/${id}`)
          .then(() => {
            this.todos = this.todos.filter(todo => todo.id !== id);
          })
          .catch(error => {
            console.error('Error deleting todo:', error);
          });
      }
    }
  });
  