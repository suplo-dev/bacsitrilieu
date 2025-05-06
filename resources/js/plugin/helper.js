export default {
    install(app) {
        app.config.globalProperties.$img = (pathToImg) => {
            if (pathToImg) {
                return import.meta.env.BASE_URL + 'storage/' + pathToImg
            }
            return import.meta.env.BASE_URL + 'storage/u/default.jpg'
        };
    },
};
