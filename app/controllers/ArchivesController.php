<?php
require_once APP_SERVICE_PATH . '/MarkdownParser.php';
require_once APP_SERVICE_PATH . '/ArchivesService.php';

class ArchivesController extends Controller {
    
    private $archivesService;
    
    public function __construct($request) {
        parent::__construct($request);
        $this->archivesService = new ArchivesService();
    }
    
    public function index() {
        seo()->setTitle(is_chinese() ? '世界观' : 'Worldview');
        seo()->setDescription(is_chinese() 
            ? '探索邦国崛起服务器的宏大世界观，了解编年史、术语库与官方剧情设定。'
            : 'Explore the grand worldview of BangGuo Rise server - chronicles, terminology, and official lore.'
        );
        
        $preface = $this->archivesService->getPreface();
        $catalog = $this->archivesService->getCatalog();

        $this->view('worldview/library', [
            'preface' => $preface,
            'catalog' => $catalog
        ]);
    }
    
    public function show() {
        $volumeId = $this->request->get('volume_id');
        $docId = $this->request->get('doc_id');

        if (!$volumeId || !$docId) {
            $this->redirect('/worldview');
            return;
        }

        $document = $this->archivesService->getDocumentContentById($volumeId, $docId);

        if (!$document || !$document['content']) {
            http_response_code(404);
            echo "Document not found";
            return;
        }
        
        $docTitle = $document['document']['title'] ?? '世界观文档';
        $volTitle = $document['volume']['title'] ?? '';
        $fullTitle = $docTitle . ' - ' . $volTitle . ' - 邦国文库';
        seo()->setTitle($fullTitle);
        seo()->setDescription(is_chinese()
            ? "阅读邦国崛起世界观文档：{$docTitle}，来自{$volTitle}"
            : "Read BangGuo Rise worldview document: {$docTitle} from {$volTitle}"
        );

        $this->view('worldview/document', [
            'document' => $document
        ]);
    }
}