<?php

namespace App\Controller;

class ArticlesController extends AppController
{

    public function index() //記事一覧画面表示
    {
        $articles = $this->Articles->find('all');
        $this->set(compact('articles'));
    }

    public function view($id = null) //記事詳細画面表示
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('記事が保存されました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('記事の追加が出来ません。'));
        }
        $this->set('article', $article);
    }
}
