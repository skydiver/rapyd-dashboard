<?php

    namespace Skydiver\RapydDashboard\Classes;

    use Illuminate\Pagination\BootstrapThreePresenter;

    class PaginationPresenter extends BootstrapThreePresenter {

        public function render() {

            if(!$this->hasPages()) {
                return '';
            }

            return sprintf(
                '<ul class="pagination pagination-sm no-margin">%s %s %s</ul>',
               #$this->getFirst('First'),
                $this->getPreviousButton(),
                $this->getLinks(),
                $this->getNextButton()
               #$this->getLast('Last')
            );

        }

        protected function getLast($text = '&raquo;') {
            if($this->currentPage() >= $this->lastPage()) {
                return $this->getDisabledTextWrapper($text);
            } else {
                $url = $this->paginator->url($this->lastPage());
                return $this->getPageLinkWrapper($url, $text);
            }
        }

        public function getFirst($text = '&laquo;') {
            if($this->currentPage() <= 1) {
                return $this->getDisabledTextWrapper($text);
            } else {
                $url = $this->paginator->url(1);
                return $this->getPageLinkWrapper($url, $text);
            }
        }

        protected function getDisabledTextWrapper($text) {
            return '<li class="disabled"><a>'.$text.'</a></li>';
        }

        protected function getActivePageWrapper($text) {
            return '<li class="active"><a>'.$text.'</a></li>';
        }

        protected function getUrlLinks(array $urls) {
            $html = '';
            foreach($urls as $page => $url) {
                $url = $this->paginator->url($page);
                $html .= $this->getPageLinkWrapper($url, $page);
            }
            return $html;
        }

    }

?>