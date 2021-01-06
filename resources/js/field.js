Nova.booting((Vue, router, store) => {
  Vue.component('index-markdownextra', require('./components/IndexField'))
  Vue.component('detail-markdownextra', require('./components/DetailField'))
  Vue.component('form-markdownextra', require('./components/FormField'))
})
