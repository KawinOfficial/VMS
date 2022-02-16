const app = Vue.createApp({
  data() {
    return {
      url_page: "/venderCOVID/API/authen.php",

      form: {
        username: "",
        password: "",
      },
    };
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      console.log(this.form);

      axios.post(this.url_page, this.form).then(({ data: { state } }) => {
        // console.log(state);
        if (state) {
          Swal.fire({
            icon: "success",
            title: "Login success",
            showConfirmButton: false,
            timer: 1500,
          }).then(() => (window.location = "Request.php"));
        } else {
          Swal.fire({
            icon: "error",
            title: "Login fail",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      });
    },
  },
});

app.mount("#login");
