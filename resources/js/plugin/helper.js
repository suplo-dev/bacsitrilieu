export default {
    install(app) {
        app.config.globalProperties.$img = (pathToImg) => {
            if (!pathToImg) {
                return import.meta.env.VITE_APP_URL + '/storage/u/default.jpg';
            }

            if (pathToImg.startsWith('http') || pathToImg.startsWith('/') || pathToImg.startsWith('data:')) {
                return pathToImg;
            }

            return import.meta.env.VITE_APP_URL + '/storage/' + pathToImg;
        };
    },
};
