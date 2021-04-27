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
                $this->Flash->success(__('記事を保存する'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('記事の追加が出来ません。'));
        }
        $this->set('article', $article);
    }

    public function edit($id = null)
    {
        $article = $this->Articles->get($id);
        if($this->request->is(['post','put'])){
            $this->Articles->patchEntity($article, $this->request->getData());
            if($this->Articles->save($article)){
                $this->Flash->success(__('記事が更新されました'));
            }
            $this->Flash->error(__('unable to update your article'));
        }
        $this->set('article', $article);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if($this->Articles->delete($article)){
            $this->Flash->success(__('id: {0} の記事が削除されました。', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }



}
