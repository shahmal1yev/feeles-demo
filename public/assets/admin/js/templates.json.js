export default {
    "newBanner": `
        <div class='col col-sm-6 col-lg-4 p-2'>
            <form class='needs-validation bg-white shadow-sm p-3' novalidate>
                <div>
                    <input required type='text' class='form-control' placeholder='Bağlantı' />
                </div>
                <div class='mt-2'>
                    <div class='custom-file'>
                        <input required type='file' accept='image/png, image/jpeg' class='custom-file-input' />
                        <label class='custom-file-label'>Banner seçin</label>
                    </div>
                </div>
                <div class='mt-2'>
                    <button type='submit' class='btn btn-block btn-primary banner-item-save-button'>Yüklə</button>
                    <button type='button' class='btn btn-block btn-danger banner-item-deleter-button mt-1'>Sil</button>
                </div>
            </form>
        </div>
    `,
    
    "newSubbanner": `
        <div class='col col-sm-6 col-lg-4 p-2'>
            <form class='needs-validation bg-white shadow-sm p-3' novalidate>
                <div>
                    <input maxlength='255' required type='text' class='form-control' placeholder='Bağlantı' />
                </div>
                <div class='mt-2'>
                    <input maxlength='255' required type='text' name='label' class='form-control' placeholder='Başlıq' />
                </div>
                <div class='mt-2'>
                    <div class='custom-file'>
                        <input required type='file' accept='image/png, image/jpeg' class='custom-file-input' />
                        <label class='custom-file-label'>Banner seçin</label>
                    </div>
                </div>
                <div class='mt-2'>
                    <button type='submit' class='btn btn-block btn-primary banner-item-save-button'>Yüklə</button>
                    <button type='button' class='btn btn-block btn-danger banner-item-deleter-button mt-1'>Sil</button>
                </div>
            </form>
        </div>
    `,
    
    "newHashtag": `
        <div class='col col-sm-6 col-lg-4 p-2'>
            <form class='needs-validation bg-white shadow-sm p-3' novalidate>
                <div class='input-group'>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">#</span>
                    </div>
                    <input required type='text' class='form-control' name='azLabel' placeholder='Etiket | AZ' />
                </div>
                <div class='input-group mt-2'>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">#</span>
                    </div>
                    <input required type='text' class='form-control' name='ruLabel' placeholder='Etiket | RU' />
                </div>
                <div class='input-group mt-2'>
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">#</span>
                    </div>
                    <input required type='text' class='form-control' name='enLabel' placeholder='Etiket | EN' />
                </div>
                <div class='mt-2'>
                    <input required type='text' class='form-control' name='link' placeholder='Bağlantı' />
                </div>
                <div class='mt-2'>
                    <button type='submit' class='btn btn-block btn-primary hashtag-item-save-button'>Əlavə et</button>
                    <button type='button' class='btn btn-block btn-danger hashtag-item-deleter-button mt-1'>Sil</button>
                </div>
            </form>
        </div>
    `
}