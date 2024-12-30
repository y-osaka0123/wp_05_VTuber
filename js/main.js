// Gallery の表示
jQuery(document).ready(function($) {
    // モーダル表示の初期化
    function initModal() {
        const modal = document.getElementById("image-modal");
        const modalImg = document.getElementById("modal-img");
        const closeBtn = document.querySelector(".close");
        // 画像クリックイベントを再設定する
        if (modal && modalImg && closeBtn) {
            const images = document.querySelectorAll(".gallery_img");
            images.forEach(img => {
                img.addEventListener("click", function () {
                    const fullImageSrc = this.getAttribute("data-full");
                    if (fullImageSrc) {
                        modalImg.src = fullImageSrc;
                        modal.classList.add("show");
                    }
                });
            });
            // 閉じるボタン
            closeBtn.addEventListener("click", () => {
                modal.classList.remove("show");
            });
            // モーダル背景をクリックしたらモーダルを閉じる
            modal.addEventListener("click", event => {
                if (event.target === modal) {
                    modal.classList.remove("show");
                }
            });
        }
    }
    
    const $container = $('.masonry-container');
    function debounce(func, delay) {
        let timeout;
        return function() {
            clearTimeout(timeout);
            timeout = setTimeout(func, delay);
        };
    }

    function applyMasonry(gutterSize) {
        $container.imagesLoaded(function () {
            $container.masonry({
                itemSelector: '.gallery_item',
                columnWidth: '.gallery_item',
                percentPosition: true,
                gutter: gutterSize
            });

            $container.addClass('masonry-initialized'); // 表示
        });
    }

    function updateMasonry() {
        const mediaQuery = window.matchMedia("(max-width: 768px)");
        const gutterSize = mediaQuery.matches ? 5 : 25;

        if ($container.data('masonry')) {
            $container.masonry('layout'); // レイアウト再計算
        } else {
            applyMasonry(gutterSize);
        }
    }

    // 初期化
    $(window).on('load', function() {
        updateMasonry();
    });

    // Resizeイベントをデバウンス
    window.addEventListener("resize", debounce(updateMasonry, 300));

    initModal();
});

// 画面遷移時の　フェードイン/アウト
document.addEventListener("DOMContentLoaded", function() {
    // オーバーレイ要素を作成し、bodyに追加
    const overlay = document.createElement("div");
    overlay.className = "overlay";
    document.body.appendChild(overlay);

    // 全てのリンクに対してクリックイベントを設定
    const links = document.querySelectorAll("a");
    links.forEach(link => {
        link.addEventListener("click", function(event) {
            if(this.target === "_blank") {
                return;
            }
        event.preventDefault(); // デフォルトのリンク動作を無効化
        const targetUrl = this.href; // クリックされたリンクのURLを取得
        document.body.classList.add("fade-out"); // フェードアウトクラスを追加
        setTimeout(function() {
            window.location = targetUrl; // 一定時間後にターゲットURLへ遷移
        }, 300); // CSSのトランジション時間と一致
        });
    });

    // ページ表示時のイベントを設定
    window.addEventListener("pageshow", function(event) {
        if (event.persisted) { // ページがキャッシュから読み込まれた場合
        document.body.classList.remove("fade-out");
        document.body.classList.add("fade-in"); // フェードインクラスを追加
        removeOverlay(); // オーバーレイを削除
        }
    });
    // オーバーレイを削除する関数
    function removeOverlay() {
        overlay.parentNode.removeChild(overlay);
    }
    document.body.classList.add("fade-in"); // 初回表示時にフェードインクラスを追加
    setTimeout(function() {
        overlay.style.opacity = "0"; // オーバーレイの透明度を0に設定
        overlay.style.filter = "blur(10px)"; // オーバーレイにぼかし効果を追加
        setTimeout(removeOverlay, 500); // トランジション終了後にオーバーレイを削除
    }, 300); // フェードイン開始のタイミング
});
  

document.addEventListener('DOMContentLoaded', () => {
  const bodyClass = document.body.classList;
  if (!(bodyClass.contains('archive') || bodyClass.contains('single'))) {
    return; // 条件を満たさない場合は処理を中断
  }
  function adjustPositionsBasedOnPageHeight() {
    const pageHeight = document.documentElement.scrollHeight; // ページ全体の高さ
    // クラス名で要素を取得
    const hil = document.querySelector(".bg_a_common_hil");
    const hir = document.querySelector(".bg_a_common_hir");
    const cel = document.querySelector(".bg_a_common_cel");
    const cer = document.querySelector(".bg_a_common_cer");
    const lor = document.querySelector(".bg_a_common_lor");
    const lol = document.querySelector(".bg_a_common_lol");
  
    // 高さに応じた位置変更のロジック
    if (hil && hir && cel && cer && lor && lol) {
    if (pageHeight >= 2500) {
      hil.style.top = "0px"; // news 大
      hir.style.top = "150px";
      cel.style.display = "block";
      cer.style.display = "block";
      lol.style.bottom = "300px"; // 下部要素をさらに上に
      lor.style.bottom = "300px"; // 下部要素をさらに上に
    } else if (pageHeight >= 2000) {
        hil.style.top = "200px"; // gallery 大
        hir.style.top = "150px"
        cel.style.display = "block";
        cer.style.display = "block";
        lor.style.bottom = "0px";
        lol.style.bottom = "50px";
    } else if (pageHeight >= 1800) {
        hil.style.top = "0px"; // news１投稿
        hir.style.top = "0px"; // デフォルト位置
        cel.style.display = "none";
        cer.style.display = "none";
        lol.style.bottom = "0px";
        lor.style.bottom = "0px";
    } else if (pageHeight >= 1700) {
        hil.style.top = "500px"; // gallery中くらい
        hir.style.top = "300px"; 
        cel.style.display = "none";
        cer.style.display = "none";
        lol.style.bottom = "0px";
        lor.style.bottom = "0px";
      } else {
      hil.style.top = "150px"; // 下げる
      hir.style.top = "200px";
      cel.style.display = "none";
      cer.style.display = "none";
      lor.style.bottom = "0px";
    }
    }
  }
  // ページ読み込み時とリサイズ時に位置を調整
  window.addEventListener("load", adjustPositionsBasedOnPageHeight);
  window.addEventListener("resize", adjustPositionsBasedOnPageHeight);
});

document.addEventListener("DOMContentLoaded", function () {
const hamburger = document.querySelector(".hamburger");
const mobileMenu = document.querySelector(".mobile_menu");

// ハンバーガーメニューのクリックイベント
hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("active");
    mobileMenu.classList.toggle("active");
    });
});
