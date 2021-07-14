import * as Helper from '../../js/helpers.js';
import Template from './templates.json.js';

function Banners()
{
    this.container = $('#newBanners');
    this.addTrigger = $('#addNewBannerItem');

    this.newItem = () => {
        let html = $(Template.newBanner);

        let file = $(html).find('[type="file"]');
        let link = $(html).find('[type="text"]');
        let delBtn = $(html).find('[type="button"]');
        let subBtn = $(html).find('[type="submit"]');
        let form = $(html).find('form');

        return {
            file,
            link,
            delBtn,
            subBtn,
            html,
            form
        }
    }

    this.addTrigger.click(() => {
        let newForm = this.newItem();

        this.deleteEvent(newForm.delBtn, newForm.html);
        this.saveEvent(newForm.subBtn, newForm.link, newForm.file, newForm.form, newForm.html)

        this.container.prepend(newForm.html);
    });

    this.deleteEvent = (btn, html) => {
        $(btn).click(() => $(html).remove());
    }

    this.saveEvent = (btn, link, file, form, html) => {
        $(btn).click((e) => {
            e.preventDefault();

            if (form[0].checkValidity())
            {
                form.find('input, button').prop('disabled', true);

                axios({
                    url: '/api/admin/banners/store',
                    method: 'POST',
                    data: (function() {
                        let formData = new FormData();

                        formData.append('banner', file[0].files[0]);
                        formData.append('link', link.val());

                        return formData;
                    })(),
                    headers: {
                        ContentType: 'multipart/form-data'
                    },
                })
                .then(() => {
                    html.remove();
                    Helper.showToast({
                        text: 'Banner əlavə edildi'
                    });
                })
                .catch(err => {
                    Helper.showToast({
                        text: 'Xəta baş verdi',
                        backgroundColor: '#dc3545'
                    });
                })
                .finally(() => {
                    form.find('input, button').prop('disabled', false);
                });
            }

            form.addClass('was-validated').find('input, button').prop('disabled', false);
        });
    }

    
    this.banners = $('.banner-item');
    this.banners = new Map(
        Array.from(this.banners).map(bannerItem => [$(bannerItem).attr('id'), bannerItem])
    );

    for(let bannerItem of this.banners)
    {
        let [id, banner] = bannerItem;

        let deleteBtn = $(banner).find('.banner-delete-button');
        let saveBtn   = $(banner).find('.banner-save-button');
        let linkInput = $(banner).find('.banner-link-input');


        deleteBtn.click((e) => {
            e.preventDefault();

            deleteBtn.prop('disabled', true);

            axios({

                method: 'POST',
                url: '/api/admin/banners/remove',
                data: {
                    bannerID: id
                }
            })
            .then(() => {
                Helper.showToast({
                    text: 'Banner silindi'
                });

                $(banner).remove();
            })
            .catch((err) => {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                });
            })
            .finally(() => {
                deleteBtn.prop('disabled', false);
            });
        });

        saveBtn.click((e) => {

            e.preventDefault();

            saveBtn.prop('disabled', true);

            axios({
                method: 'POST',
                url: '/api/admin/banners/update',
                data: {
                    bannerID: id,
                    link: linkInput.val()
                }
            })
            .then(() => {
                Helper.showToast({
                    text: 'Link yeniləndi'
                });
            })
            .catch((e) => {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                })
            })
            .finally(() => {
                saveBtn.prop('disabled', false);
            });
        });
    }
}

function Hashtags()
{
    this.container = $('#newHashtags');
    this.addTrigger = $('#addNewHashtagItem');

    this.newItem = () => {
        let html = $(Template.newHashtag);

        let form = $(html).find('form');
        let inputs = $(html).find('[name]');
        let deleteBtn = $(html).find('[type="button"]');
        let saveBtn   = $(html).find('[type="submit"]');

        return {
            html,
            form,
            inputs,
            deleteBtn,
            saveBtn
        }
    }

    this.addTrigger.click(() => {
        let newForm = this.newItem();

        this.deleteEvent(newForm.deleteBtn, newForm.html);
        this.saveEvent(newForm.saveBtn, newForm.inputs, newForm.html, newForm.form)

        this.container.prepend(newForm.html);
    });

    this.deleteEvent = (btn, html) => {
        btn.click(() => $(html).remove());
    }

    this.saveEvent = (btn, inputs, html, form) => {
        btn.click((e) => {
            
            e.preventDefault();

            if (form[0].checkValidity())
            {
                inputs.prop('disabled', true);
                
                axios({
                    method: 'POST',
                    url: '/api/admin/hashtags/store',
                    data: (() => {
                        let data = {};

                        inputs.each(function() {
                            data[this.name] = this.value;
                        });

                        return data;
                    })()
                })
                .then((response) => {
                    html.remove();
                    Helper.showToast({
                        text: 'Heşteq əlavə edildi'
                    })
                })
                .catch((error) => {
                    Helper.showToast({
                        text: 'Xəta baş verdi',
                        backgroundColor: '#dc3545'
                    });
                })
                .finally(() => {
                    form.find('input, button').prop('disabled', false);
                });
            }
            
            form.addClass('was-validated').find('input, button').prop('disabled', false);
        });
    }

    this.availableRows = $('.hashtag-row');

    for(let row of this.availableRows)
    {
        let inputs = $(row).find('[name]');
        let saveBtn = $(row).find('.hashtag-save-button');
        let deleteBtn = $(row).find('.hashtag-delete-button');

        console.log(row);

        saveBtn.click((e) => {

            e.preventDefault();

            let notValidInputs = [];

            for (let input of inputs)
            {
                if (!input.validity.valid)
                {
                    $(input).addClass('is-invalid');
                    notValidInputs.push(input);
                }
            }

            if (notValidInputs.length)
                return false;
            
            $(
                Array.from(inputs)
                .concat(
                    Array.from(saveBtn),
                    Array.from(deleteBtn)
                )
            ).prop('disabled', true);

            axios({
                method: 'POST',
                url: '/api/admin/hashtags/update',
                data: (() => {
                    let data = {};

                    for(let input of inputs)
                    {
                        data[input.name] = input.value;
                    }

                    data.id = $(row).data().rowId;

                    return data;
                })(),
            })
            .then((response) => {
                Helper.showToast({
                    text: 'Heşteq yeniləndi'
                });
            })
            .catch(error => {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                });

                console.log(error, error.response);
            })
            .finally(() => {
                $(
                    Array.from(inputs)
                    .concat(
                        Array.from(saveBtn),
                        Array.from(deleteBtn)
                    )
                )
                .prop('disabled', false)
                .removeClass('is-invalid');
            })
        });

        deleteBtn.click(e => {
            e.preventDefault();

            $(
                Array.from(inputs)
                .concat(
                    Array.from(saveBtn),
                    Array.from(deleteBtn)
                )
            ).prop('disabled', true);

            axios({
                method: 'POST',
                url: '/api/admin/hashtags/remove',
                data: {
                    id: $(row).data().rowId
                }
            })
            .then(() => {
                Helper.showToast({
                    text: 'Heşteq silindi'
                });

                $(row).remove()
            })
            .catch(err => {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                });

                console.log(err, err.response);
            })
            .finally(() => {
                $(
                    Array.from(inputs)
                    .concat(
                        Array.from(saveBtn),
                        Array.from(deleteBtn)
                    )
                ).prop('disabled', false);
            });
        });
    }
}


function Subbanners()
{
    this.container = $('#newSubbanners');
    this.addTrigger = $('#addNewSubbannerItem');

    this.newItem = () => {
        let html = $(Template.newSubbanner);

        let file = $(html).find('[type="file"]');
        let link = $(html).find('[type="text"]');
        let label = $(html).find('[name="label"]');
        let delBtn = $(html).find('[type="button"]');
        let subBtn = $(html).find('[type="submit"]');
        let form = $(html).find('form');

        return {
            file,
            link,
            label,
            delBtn,
            subBtn,
            html,
            form
        }
    }

    this.addTrigger.click(() => {
        let newForm = this.newItem();

        this.deleteEvent(newForm.delBtn, newForm.html);
        this.saveEvent(newForm.subBtn, newForm.link, newForm.label, newForm.file, newForm.form, newForm.html)

        this.container.prepend(newForm.html);
    });

    this.deleteEvent = (btn, html) => {
        $(btn).click(() => $(html).remove());
    }

    this.saveEvent = (btn, link, label, fileInput, form, html) => {
        $(btn).click((e) => {
            e.preventDefault();

            if (form[0].checkValidity())
            {
                form.find('input, button').prop('disabled', true);

                let _URL = window.URL || window.webkitURL;
                let imageSrc = _URL.createObjectURL(fileInput[0].files[0]);

                fileInput.prop('disabled', true);

                Helper.loadImage(imageSrc)
                .then((image) => {
                    if (image.width == 450 && image.height == 450)
                    {
                        axios({
                            url: '/api/admin/subbanners/store',
                            method: 'POST',
                            data: (function() {
                                let formData = new FormData();
        
                                formData.append('subbanner', fileInput[0].files[0]);
                                formData.append('label', label.val());
                                formData.append('link', link.val());
        
                                return formData;
                            })(),
                            headers: {
                                ContentType: 'multipart/form-data'
                            },
                        })
                        .then((res) => {
                            html.remove();
                            Helper.showToast({
                                text: 'Banner əlavə edildi'
                            });

                            console.log(res);
                        })
                        .catch(err => {
                            Helper.showToast({
                                text: 'Xəta baş verdi',
                                backgroundColor: '#dc3545'
                            });

                            console.log(err, err.response);
                        })
                        .finally(() => {
                            form.find('input, button').prop('disabled', false);
                        });
                    }
                    else
                    {
                        Helper.showToast({
                            text: 'Şəkil ölçüsü 450x450 olmalıdır.',
                            backgroundColor: '#dc3545'
                        });
                    }
                })
                .catch(err => {
                    Helper.showToast({
                        text: 'Xəta baş verdi',
                        backgroundColor: '#dc3545'
                    })
                })
                .finally(() => {
                    fileInput.prop('disabled', false);
                });
            }

            form.addClass('was-validated').find('input, button').prop('disabled', false);
        });
    }

    
    this.banners = $('.subbanner-item');
    this.banners = new Map(
        Array.from(this.banners).map(bannerItem => [$(bannerItem).attr('id'), bannerItem])
    );

    for(let bannerItem of this.banners)
    {
        let [id, banner] = bannerItem;

        let deleteBtn = $(banner).find('.subbanner-delete-button');
        let saveBtn   = $(banner).find('.subbanner-save-button');
        let linkInput = $(banner).find('.subbanner-link-input');


        deleteBtn.click((e) => {
            e.preventDefault();

            deleteBtn.prop('disabled', true);

            axios({

                method: 'POST',
                url: '/api/admin/subbanners/remove',
                data: {
                    subbannerID: id
                }
            })
            .then(() => {
                Helper.showToast({
                    text: 'Subbanner silindi'
                });

                $(banner).remove();
            })
            .catch((err) => {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                });

                console.log(err, err.response);
            })
            .finally(() => {
                deleteBtn.prop('disabled', false);
            });
        });

        saveBtn.click((e) => {

            e.preventDefault();

            saveBtn.prop('disabled', true);

            axios({
                method: 'POST',
                url: '/api/admin/subbanners/update',
                data: {
                    subbannerID: id,
                    link: linkInput.val(),
                    label: label.val()
                }
            })
            .then(() => {
                Helper.showToast({
                    text: 'Link yeniləndi'
                });
            })
            .catch((e) => {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                })
            })
            .finally(() => {
                saveBtn.prop('disabled', false);
            });
        });
    }
}

function ProductCard(item)
{
    this.item = $(item);
    this.card = this.item.find('.product-card');

    this.productID = this.card.data().id;

    this.deleteBtn = this.card.find('.delete-product-btn');

    this.href = this.deleteBtn.attr('href');

    this.imageList = this.card.find('.product-image-list');

    this.imageList.each(function() {
        lightGallery(this);
    });

    this.deleteBtn.click(e => {
        e.preventDefault();

        this.deleteBtn
        .addClass('disabled');

        axios({
            url: this.href,
            method: 'POST',
        })
        .then((response) => {
            Helper.showToast({
                text: response.data.message
            });

            this.item.remove();
        })
        .catch(() => {
            Helper.showToast({
                text: 'Xəta baş verdi',
                backgroundColor: '#dc3545'
            });
        })
        .finally(() => {
            this.deleteBtn.removeClass('disabled');
        });
        
    })
}

function NewProduct()
{
    this.form = $('#newProductForm');

    if (!this.form.length)
        return;

    this.productName = {
        az: this.form.find('[name="azName"]'),
        ru: this.form.find('[name="ruName"]'),
        en: this.form.find('[name="enName"]')
    };

    this.productDesc = {
        az: this.form.find('[name="azDesc"]'),
        ru: this.form.find('[name="ruDesc"]'),
        en: this.form.find('[name="enDesc"]')
    }

    this.price = this.form.find('[name="price"]');
    this.category = this.form.find('[name="category"]')


    this.images = [];
    this.pond = FilePond.create(Helper.getElement('productImageUploadInput'))

    console.log(this.pond);
    
    this.pond.setOptions({
        server: {
            process: (
                fieldName,
                file,
                metadata,
                load,
                error,
                progress,
                abort,
                transfer,
                options
            ) => {
                axios({
                    method: 'POST',
                    url: '/admin/products/images/store',
                    data: (function() {
                        const formData = new FormData();

                        formData.append(fieldName, file, file.name);

                        return formData;
                    })()
                })
                .then(response => {
                    load(response.data);
                    this.images.push(response.data);
                })
                .catch(err => {
                    console.log(err, err.response);
                    error();
                })
                .finally(() => {
                    let disableBool = (this.images.length) ? false : true;
                    this.saveBtn.prop('disabled', disableBool);
                });
            },

            revert: (
                uniqueFileID,
                load,
                error
            ) => {
                axios({
                    method: 'POST',
                    url: '/admin/products/images/remove'.concat('/', uniqueFileID),
                })
                .then(response => {
                    load();
                    this.images.remove(uniqueFileID);
                })
                .catch(err => {
                    error();
                })
                .finally(() => {
                    let disableBool = (this.images.length) ? false : true;
                    this.saveBtn.prop('disabled', disableBool);
                });
            }
        }
    });

    this.saveBtn = this.form.find('.submit-button');

    this.saveBtn.click((e) => {
        e.preventDefault();

        (() => {
            this.saveBtn
            .addClass('disabled')
            .prop('disabled', true);

            $('[data-error-reporter]')
            .text('');
        })();

        axios({
            method: 'POST',
            url: '/admin/products/store',
            data: (() => {
                const formData = new FormData;

                formData.append(
                    this.productName.az.attr('name'),
                    this.productName.az.val()
                );

                formData.append(
                    this.productName.ru.attr('name'),
                    this.productName.ru.val()
                );

                formData.append(
                    this.productName.en.attr('name'),
                    this.productName.en.val()
                );

                formData.append(
                    this.productDesc.az.attr('name'),
                    this.productDesc.az.val()
                );

                formData.append(
                    this.productDesc.ru.attr('name'),
                    this.productDesc.ru.val()
                );

                formData.append(
                    this.productDesc.en.attr('name'),
                    this.productDesc.en.val()
                );

                formData.append(
                    this.price.attr('name'),
                    this.price.val()
                );

                formData.append(
                    this.category.attr('name'),
                    this.category.val()
                );

                for(let imageName of this.images)
                    formData.append('images[]', imageName);

                return formData;
            })()
        })
        .then(response => {
            Helper.showToast({
                text: 'Məhsul yaradıldı, səhifə yenilənir...'
            });

            setTimeout(() => window.location.reload(), 1000);
        })
        .catch(err => {
            try {
                switch(err.response.status) {
                    case 422:
                        for(let errorItem of Object.entries(err.response.data.errors)) {
                            let [fieldName, errors] = errorItem;

                            let relationFieldErrReporter = $(`[data-error-reporter="${fieldName}"]`);
                            console.log(fieldName);

                            relationFieldErrReporter.text(errors.join(' '));
                        }
                    break;
                    default:
                        Helper.showToast({
                            text: 'Xəta baş verdi',
                            backgroundColor: '#dc3545'
                        });
                    break;
                }
            } catch(e) {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                });
            }

            console.warn(err, err.response);
        })
        .finally(() => {
            this.saveBtn
            .removeClass('disabled')
            .prop('disabled', false);
        });
    });
}

function EditProduct()
{
    this.form = $('#editProductForm');

    if (!this.form.length)
        return;

    this.productName = {
        az: this.form.find('[name="azName"]'),
        ru: this.form.find('[name="ruName"]'),
        en: this.form.find('[name="enName"]')
    };

    this.productDesc = {
        az: this.form.find('[name="azDesc"]'),
        ru: this.form.find('[name="ruDesc"]'),
        en: this.form.find('[name="enDesc"]')
    }

    this.price = this.form.find('[name="price"]');
    this.category = this.form.find('[name="category"]')


    this.images = [];
    this.pond = FilePond.create(Helper.getElement('productImageUploadInput'))

    console.log(this.pond);
    
    this.pond.setOptions({
        server: {
            process: (
                fieldName,
                file,
                metadata,
                load,
                error,
                progress,
                abort,
                transfer,
                options
            ) => {
                axios({
                    method: 'POST',
                    url: '/admin/products/images/store',
                    data: (function() {
                        const formData = new FormData();

                        formData.append(fieldName, file, file.name);

                        return formData;
                    })()
                })
                .then(response => {
                    load(response.data);
                    this.images.push(response.data);
                })
                .catch(err => {
                    console.log(err, err.response);
                    error();
                })
                .finally(() => {
                    let disableBool = (this.images.length) ? false : true;
                    this.saveBtn.prop('disabled', disableBool);
                });
            },

            revert: (
                uniqueFileID,
                load,
                error
            ) => {
                axios({
                    method: 'POST',
                    url: '/admin/products/images/remove'.concat('/', uniqueFileID),
                })
                .then(response => {
                    load();
                    this.images.remove(uniqueFileID);
                })
                .catch(err => {
                    error();
                })
                .finally(() => {
                    let disableBool = (this.images.length) ? false : true;
                    this.saveBtn.prop('disabled', disableBool);
                });
            }
        }
    });

    this.saveBtn = this.form.find('.submit-button');

    this.saveBtn.click((e) => {
        e.preventDefault();

        (() => {
            this.saveBtn
            .addClass('disabled')
            .prop('disabled', true);

            $('[data-error-reporter]')
            .text('');
        })();

        axios({
            method: 'POST',
            url: '/admin/products/update'.concat('/', this.form.data().productId),
            data: (() => {
                const formData = new FormData;

                formData.append(
                    this.productName.az.attr('name'),
                    this.productName.az.val()
                );

                formData.append(
                    this.productName.ru.attr('name'),
                    this.productName.ru.val()
                );

                formData.append(
                    this.productName.en.attr('name'),
                    this.productName.en.val()
                );

                formData.append(
                    this.productDesc.az.attr('name'),
                    this.productDesc.az.val()
                );

                formData.append(
                    this.productDesc.ru.attr('name'),
                    this.productDesc.ru.val()
                );

                formData.append(
                    this.productDesc.en.attr('name'),
                    this.productDesc.en.val()
                );

                formData.append(
                    this.price.attr('name'),
                    this.price.val()
                );

                formData.append(
                    this.category.attr('name'),
                    this.category.val()
                );

                for(let imageName of this.images)
                    formData.append('images[]', imageName);

                return formData;
            })()
        })
        .then(response => {
            Helper.showToast({
                text: response.data.message
            });

            setTimeout(() => window.location.reload(), 1000);
        })
        .catch(err => {
            try {
                switch(err.response.status) {
                    case 422:
                        for(let errorItem of Object.entries(err.response.data.errors)) {
                            let [fieldName, errors] = errorItem;

                            let relationFieldErrReporter = $(`[data-error-reporter="${fieldName}"]`);
                            console.log(fieldName);

                            relationFieldErrReporter.text(errors.join(' '));
                        }
                    break;
                    default:
                        Helper.showToast({
                            text: 'Xəta baş verdi',
                            backgroundColor: '#dc3545'
                        });
                    break;
                }
            } catch(e) {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                });
            }

            console.log(err, err.response);
        })
        .finally(() => {
            this.saveBtn
            .removeClass('disabled')
            .prop('disabled', false);
        });
    });

    this.availableImages = new Map(
        Array.from(this.form.find('.product-available-images').children())
        .map(imageItem => {
            return [
                $(imageItem).find('.product-image-deleter'),
                $(imageItem)
            ];
        })
    );

    for(let item of this.availableImages) {
        let [deleteBtn, imageItem] = item;

        deleteBtn.click(e => {
            e.preventDefault();

            deleteBtn.prop('disabled', true);

            axios({
                method: 'POST',
                url: deleteBtn.data().href
            })
            .then(response => {
                Helper.showToast({
                    text: 'Şəkil silindi'
                });

                imageItem.remove();
            })
            .catch(err => {
                Helper.showToast({
                    text: 'Xəta baş verdi',
                    backgroundColor: '#dc3545'
                });
            })
            .finally(() => {
                deleteBtn.prop('disabled', false);
            });
        });
    }
}

function EditProductDetail() {
    this.availableRows = $('.product-detail-row');

    if (!this.availableRows.length)
        return false;
    
    for(let row of this.availableRows) {
        let inputs = $(row).find('[name]');
        let saveBtn = $(row).find('.save-button');
        let deleteBtn = $(row).find('.delete-button');

        saveBtn.click((e) => {
            e.preventDefault();

            let notValidInputs = [];

            for(let input of inputs)
            {
                if (!input.validity.valid)
                {
                    $(input).addClass('is-invalid');
                    notValidInputs.push(input);
                }
            }

            if (notValidInputs.length)
                return false;

            $(
                Array.from(inputs)
                .concat(
                    Array.from(saveBtn),
                    Array.from(deleteBtn)
                )
            ).prop('disabled', true);

            axios({
                method: 'POST',
                url: `/admin/products/stock/update/${$(row).data().productDetailId}`,
                data: (() => {
                    let data = new FormData();

                    for(let input of inputs)
                    {
                        data.append(input.name, input.value);
                    }

                    return data;
                })()
            })
            .then((response) => {
                Helper.showToast({
                    text: response.data.message
                });
            })
            .catch((err) => {
                let message = 'Xəta baş verdi';

                if ('response' in err)
                {
                    message = err.response.data.message;
                }

                Helper.showToast({
                    text: message,
                    backgroundColor: '#dc3545'
                });
            })
            .finally(() => {
                $(
                    Array.from(inputs)
                    .concat(
                        Array.from(saveBtn),
                        Array.from(deleteBtn)
                    )
                ).prop('disabled', false)
                .removeClass('is-invalid');
            });
        });

        deleteBtn.click((e) => {
            e.preventDefault();

            $(
                Array.from(inputs)
                .concat(
                    Array.from(saveBtn),
                    Array.from(deleteBtn)
                )
            ).prop('disabled', true);

            axios({
                method: 'POST',
                url: `/admin/products/stock/remove/${$(row).data().productDetailId}`,
            })
            .then(res => {
                Helper.showToast({
                    text: res.data.message
                });

                $(row).remove();

                console.log(res);
            })
            .catch(err => {
                let message = ('response' in err) ? err.response.data.message : 'Xəta baş verdi';

                Helper.showToast({
                    text: message,
                    backgroundColor: '#dc3545'
                });

                console.log(err, err.response);
            })
            .finally(() => {
                $(
                    Array.from(inputs)
                    .concat(
                        Array.from(saveBtn),
                        Array.from(deleteBtn)
                    )
                ).prop('disabled', false);
            });
        });
    }
}

function NewProductDetail() {
    this.form = $('#newProductDetailForm');
    
    if (!this.form.length)
        return false;
    
    this.productID = this.form.data().productId;
    this.inputs = this.form.find('[name]');
    this.saveBtn = this.form.find('.submit-button');

    this.saveBtn.click(e => {
        e.preventDefault();

        if (this.form[0].checkValidity()) {

            this.form
            .find('input, select, button')
            .prop('disabled', true);

            axios({
                method: 'POST',
                url: `/admin/products/stock/store/${this.productID}`,
                data: (() => {
                    let data = new FormData();

                    for(let input of this.inputs) {
                        data.append(input.name, input.value)
                    }

                    return data;
                })()
            })
            .then(res => {
                Helper.showToast({
                    text: res.data.message
                });

                console.log(res);

                // setTimeout(() => window.reload(), 1000);
            })
            .catch(err => {
                try {
                    switch(err.response.status) {
                        case 422:
                            for(let errorItem of Object.entries(err.response.data.errors)) {
                                let [fieldName, errors] = errorItem;
    
                                let relationFieldErrReporter = $(`[data-error-reporter="${fieldName}"]`);
                                console.log(fieldName);
    
                                relationFieldErrReporter.text(errors.join(' '));
                            }
                        break;
                        default:
                            Helper.showToast({
                                text: 'Xəta baş verdi',
                                backgroundColor: '#dc3545'
                            });
                        break;
                    }
                } catch(e) {
                    Helper.showToast({
                        text: 'Xəta baş verdi',
                        backgroundColor: '#dc3545'
                    });
                }
    
                console.warn(err, err.response);
            })
            .finally(() => {
                this.form
                .find('input, select, button')
                .prop('disabled', false);
            });

        }

        this.form.addClass('was-validated');
        this.inputs.prop('disabled', false);
    });
}

function EditColor() {
    this.availableRows = $('.color-row');

    if (!this.availableRows.length)
        return false;

    for(let row of this.availableRows) {
        let inputs = $(row).find('[name]');
        let saveBtn = $(row).find('.save-button');
        let deleteBtn = $(row).find('.delete-button');

        saveBtn.click(e => {
            e.preventDefault();

            let notValidInputs = [];

            for (let input of inputs)
            {
                if (!input.validity.valid)
                {
                    $(input).addClass('is-invalid');
                    notValidInputs.push(input);
                }
            }

            if (notValidInputs.length)
                return false;

            $(
                Array.from(inputs)
                .concat(
                    Array.from(saveBtn),
                    Array.from(deleteBtn)
                )
            ).prop('disabled', true);

            axios({
                method: 'POST',
                url: `/admin/colors/update/${$(row).data().colorId}`,
                data: (() => {
                    let data = new FormData();

                    for(let input of inputs) {
                        data.append(input.name, input.value);
                    }

                    return data;
                })()
            })
            .then(response => {
                Helper.showToast({
                    text: response.data.message,
                });
            })
            .catch(err => {
                let message = ('response' in err) ? err.response.data.message : 'Xəta baş verdi';

                Helper.showToast({
                    text: message,
                    backgroundColor: '#dc3545'
                });

                console.log(err, err.response);
            })
            .finally(() => {
                $(
                    Array.from(inputs)
                    .concat(
                        Array.from(saveBtn),
                        Array.from(deleteBtn)
                    )
                ).prop('disabled', false)
                .removeClass('is-invalid');
            });
        });

        deleteBtn.click((e) => {
            e.preventDefault();

            $(
                Array.from(inputs)
                .concat(
                    Array.from(saveBtn),
                    Array.from(deleteBtn)
                )
            ).prop('disabled', true);

            axios({
                method: 'POST',
                url: `/admin/colors/remove/${$(row).data().colorId}`,
            })
            .then(res => {
                Helper.showToast({
                    text: res.data.message
                });

                $(row).remove();
            })
            .catch(err => {
                let message = ('response' in err) ? err.response.data.message : 'Xəta baş verdi';

                Helper.showToast({
                    text: message,
                    backgroundColor: '#dc3545'
                });

                console.log(err, err.response);
            })
            .finally(() => {
                $(
                    Array.from(inputs)
                    .concat(
                        Array.from(saveBtn),
                        Array.from(deleteBtn)
                    )
                ).prop('disabled', false);
            });
        });
    }
}

function NewColor() {
    this.form = $('#newColorForm');

    if (!this.form.length)
        return false;

    this.inputs = this.form.find('[name]');
    this.saveBtn = this.form.find('.submit-button');

    this.saveBtn.click(e => {
        e.preventDefault();

        if (this.form[0].checkValidity()) {
            $(
                Array.from(this.inputs)
                .concat(Array.from(this.saveBtn))
            ).prop('disabled', true);

            axios({
                method: 'POST',
                url: '/admin/colors/store',
                data: (() => {
                    let data = new FormData();

                    for(let input of this.inputs) {
                        data.append(input.name, input.value);
                    }

                    return data;
                })()
            })
            .then(response => {
                Helper.showToast({
                    text: response.data.message
                });
            })
            .catch((err) => {
                try {
                    switch(err.response.status) {
                        case 422:
                            for(let errorItem of Object.entries(err.response.data.errors)) {
                                let [fieldName, errors] = errorItem;
    
                                let relationFieldErrReporter = $(`[data-error-reporter="${fieldName}"]`);
                                console.log(fieldName);
    
                                relationFieldErrReporter.text(errors.join(' '));
                            }
                        break;
                        default:
                            Helper.showToast({
                                text: 'Xəta baş verdi',
                                backgroundColor: '#dc3545'
                            });
                        break;
                    }
                } catch(e) {
                    Helper.showToast({
                        text: 'Xəta baş verdi',
                        backgroundColor: '#dc3545'
                    });

                    console.log(e);
                }
            })
            .finally(() => {
                $(
                    Array.from(this.inputs)
                    .concat(Array.from(this.saveBtn))
                ).prop('disabled', false);
            });

        }

        this.form.addClass('was-validated');
    })
}

export {
    Banners,
    Hashtags,
    Subbanners,
    ProductCard,
    NewProduct,
    EditProduct,
    EditProductDetail,
    NewProductDetail,
    EditColor,
    NewColor,
    EditSize
}